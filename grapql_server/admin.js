var mysql = require('mysql');
var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'terrorism'
});

const { ApolloServer, gql} = require('apollo-server');
const { buildFederatedSchema} = require('@apollo/federation');
const { UniqueFieldDefinitionNamesRule } = require('graphql');
const { argsToArgsConfig } = require('graphql/type/definition');
const port = 4002;
const columns = "iyear, imonth, iday, extended, country_txt, region_txt, provstate, city, latitude, longitude, specificity, vicinity, summary, multiple, success, suicide, attacktype1_txt, targtype1_txt, corp1, target1, natlty1_txt, gname, motive, claimed, weaptype1_txt, weapdetail, nkill, nkillus, nkillter, nwound, ishostkid, addnotes, propextent_txt";
const  typeDefs = gql`
        type attack {
            id: Float
            iyear: Float
            imonth: Float
            iday: Float
            extended: Float
            country_txt: String
            region_txt: String
            provstate: String
            city: String
            latitude: Float
            longitude: Float
            specificity: Float
            vicinity: Float
            summary: String
            multiple: Float
            success: Float
            suicide: Float  
            attacktype1_txt: String
            targtype1_txt: String
            corp: String
            target1: String
            natlty1_txt: String
            gname: String
            motive: String
            claimed: String
            weaptype1_txt: String
            weapdetail: String
            nkill: Float
            nkillus: String
            nkillter: String
            nwounds: Float
            ishostkid: Float
            addnotes: String
            propextent_txt: String
        }

        type article {
            article_id: Int
            title: String
            description: String
        }

        type Mutation {
            addArticle(title: String!,date: String, description: String) : String
            updateArticle(id: Float!, title: String, date: String, description: String) : String
            deleteArticle(id: Float!) : String
            addAttack(id: Float!, iyear: Float, imonth: Float, iday: Float, extended: Float, country_txt: String, region_txt: String, provstate: String, city: String, latitude: Float, longitude: Float, specificity: Float, vicinity: Float, summary: String, multiple: Float, success: Float, suicide: Float  , attacktype1_txt: String, targtype1_txt: String, corp: String, target: String, natlty1_txt: String, gname: String, motive: String, claimed: String, weaptype1_txt: String, weapdetail: String, nkill: Float, nkillus: String, nkillter: String, nwounds: Float, ishostkid: Float, addnotes: String, propextent_txt: String) : String
            updateAttack(id: Float!, iyear: Float, imonth: Float, iday: Float, extended: Float, country_txt: String, region_txt: String, provstate: String, city: String, latitude: Float, longitude: Float, specificity: Float, vicinity: Float, summary: String, multiple: Float, success: Float, suicide: Float  , attacktype1_txt: String, targtype1_txt: String, corp: String, target: String, natlty1_txt: String, gname: String, motive: String, claimed: String, weaptype1_txt: String, weapdetail: String, nkill: Float, nkillus: String, nkillter: String, nwounds: Float, ishostkid: Float, addnotes: String, propextent_txt: String) : String
            deleteAttack(id: Float) : String
        }

        extend type Query {
            attacks: [attack]
            articles: [article]
            attackById(id: Float!): [attack]
            articleById(id: Int!): [article]
        }
    `;


    const resolvers = {
        Query: {
            attacks: () => {
                return new Promise(function(resolve,reject){
                    // var columns = "iyear, imonth, iday, extended, country_txt, region_txt, provstate, city, latitude, longitude, specificity, vicinity, summary, multiple, success, suicide, attacktype1_txt, targtype1_txt, corp1, target1, natlty1_txt, gname, motive, claimed, weaptype1_txt, weapdetail, nkill, nkillus, nkillter, nwound, ishostkid, addnotes, propextent_txt";
                    connection.query(`SELECT id, ` + columns + ` FROM terrorism LIMIT 1, 500`, function (err, result, attacks) {
                        if (err)
                            reject({name:"error: " + err.message});
                        resolve(result);
                    }); 
                });
            },

            attackById: (_, args) => {
                return new Promise (function(resolve, reject) {
                    connection.query("SELECT " + columns + " FROM terrorism WHERE id = " + args.id, function (err, result, attacks) {
                        if(err)
                            reject({name:"error: " + err.message});
                        resolve(result);
                    });
                });
            },

            articles: () => {
                return new Promise(function(resolve, reject) {
                    connection.query("SELECT * FROM articles", function (err, result, articles) {
                        if (err)
                            reject({name:"error" + err.message});
                        resolve(result);
                    });
                });
            },

            articleById: (_, args) => {
                return new Promise (function(resolve, reject) {
                    connection.query("SELECT * FROM articles WHERE article_id = " + args.id, function (err, result, articles) {
                        if(err)
                            reject({name: "error" + err.message});
                        resolve(result);
                    });
                });
            }
        },

        Mutation: {
            addArticle: (_, args) => {
                let stmt = `INSERT INTO articles (title, date, description) VALUES ('${args.title}', '${args.date}','${args.description}')`;
                connection.query(stmt, function (err, result) {
                    if(err)
                        throw err;
                    console.log("Row inserted succesfully !");
                });
            },

            deleteArticle: (_, args) => {
                let stmt = `DELETE FROM articles WHERE article_id = ${args.id}`;
                connection.query(stmt, function(err, result) {
                    if(err)
                        throw err;
                    console.log("Row deleted !");
                });
            },

            updateArticle: (_, args) => {
                let stmt = `UPDATE articles SET title = '${args.title}', date = '${args.date}', description = '${args.description}' WHERE article_id = ${args.id}`;
                connection.query(stmt, function(err, result){
                    if(err)
                        throw err;
                    console.log("Row updated !");
                });
            },

            // var columns = "iyear, imonth, iday, extended, country_txt, region_txt, provstate, city, latitude, longitude, specificity, vicinity, summary, multiple, success, suicide, attacktype1_txt,
            //  targtype1_txt, corp1, target1, natlty1_txt, gname, motive, claimed, weaptype1_txt, weapdetail, nkill, nkillus, nkillter, nwound, ishostkid, addnotes, propextent_txt";
            addAttack: (_, args) => { 
                let stmt = `INSERT INTO terrorism (` + columns + `) VALUES (${args.iyear}, ${args.imonth}, ${args.iday}, ${args.extended}, '${args.country_txt}', '${args.region_txt}', '${args.provstate}', '${args.city}', ${args.latitude}, ${args.longitude}, ${args.specificity}, ${args.vicinity}, '${args.summary}', ${args.multiple}, ${args.success}, ${args.suicide}, '${args.attacktype1_txt}','${args.targtype1_txt}','${args.corp}','${args.target}', '${args.natlty1_txt}','${args.gname}','${args.motive}','${args.claimed}','${args.weaptype1_txt}','${args.weapdetail}',${args.nkill},'${args.nkillus}','${args.nkillter}',${args.nwounds},'${args.ishostkid}','${args.addnotes}','${args.propextent_txt}');`

                connection.query(stmt, function(err, result) {
                    if(err)
                        throw err;
                    console.log("Attack added !");
                });
            },

            deleteAttack: (_, args) => {
                let stmt = `D E id = ${args.id}`;
                connection.query(stmt, function(err, result) {
                    if(err)
                        throw err;
                    console.log("Attack deleted !");
                });
            },

            updateAttack: (_, args) => {
                let stmt = `UPDATE terrorism SET iyear = ${args.iyear}, imonth = ${args.imonth}, iday = ${args.iday}, extended = ${args.extended}, country_txt = '${args.country_txt}', region_txt = '${args.region_txt}', provstate = '${args.provstate}', city = '${args.city}', latitude = ${args.latitude}, longitude = ${args.longitude}, specificity = ${args.specificity},vicinity =  ${args.vicinity}, summary = '${args.summary}', multiple = ${args.multiple}, success = ${args.success}, suicide = ${args.suicide}, attacktype1_txt = '${args.attacktype1_txt}', targtype1_txt = '${args.targtype1_txt}', corp1 = '${args.corp}' ,target1 = '${args.target}',natlty1_txt = '${args.natlty1_txt}', gname = '${args.gname}', motive = '${args.motive}',claimed = '${args.claimed}', weaptype1_txt = '${args.weaptype1_txt}',weapdetail = '${args.weapdetail}', nkill = ${args.nkill}, nkillus = '${args.nkillus}', nkillter = '${args.nkillter}',nwound = ${args.nwounds}, ishostkid = '${args.ishostkid}', addnotes = '${args.addnotes}',propextent_txt = '${args.propextent_txt}' WHERE id = ${args.id};`

                connection.query(stmt, function(err, result) {
                    if(err)
                        throw err;
                    console.log('Attack updated !');
                }); 
            }
        }
    };
    


// enable error logging for each connection query
connection.on('error', function(err) {
  console.log(err.code); // example : 'ER_BAD_DB_ERROR'
});

const server = new ApolloServer({
    schema: buildFederatedSchema ([{typeDefs, resolvers}])
});

server.listen({port}).then(({url}) => {
    console.log(`Admin ready at ${url}`);
});