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
const  typeDefs = gql`
        type attack {
            eventid: Float
            country_txt: String
            region_txt: String
        }

        type article {
            article_id: Int
            title: String
            description: String
        }

        type Mutation {
            addArticle(title: String!,date: String, description: String) : String
            deleteArticle(id: Float!) : String
            updateArticle(id: Float!, title: String, date: String, description: String) : String
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
                    connection.query("SELECT eventid, country_txt, region_txt FROM terrorism", function (err, result, attacks) {
                        if (err)
                            reject({name:"error: " + err.message});
                        resolve(result);
                    }); 
                });
            },

            attackById: (_, args) => {
                return new Promise (function(resolve, reject) {
                    connection.query("SELECT eventid, country_txt, region_txt FROM terrorism WHERE eventid = " + args.id, function (err, result, attacks) {
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