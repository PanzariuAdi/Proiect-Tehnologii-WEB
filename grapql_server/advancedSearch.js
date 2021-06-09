const { ApolloServer, gql} = require('apollo-server');
const { buildFederatedSchema} = require('@apollo/federation');
const myLib = require("./utility/statistic-functions");
const port = 4003;

var mysql = require('mysql');
var c = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'terrorism'

});

const  typeDefs = gql`
    type attacks{
        ID: ID!
        summary: String
        country: String!
        city: String!
        year: Int
    }
    type map{
        lat: Float!
        longi: Float!
        city: String!
        country: String!
    }
    
    extend type Query {
        maps: [map]
        search(
            countries:[String],regions:[String],cities:[String],states:[String],motives:[String],gangs:[String],wepTypes:[String],wepSubtypes:[String],lossExtents:[String],months:[Int],years:[Int],attackTypes:[String],targetNatalities:[String],
            attackUB:Int,attackLB:Int,casualitiesUB:Int,casualitiesLB:Int,woundedUB:Int,woundedLB:Int,lossUB:Int,lossLB:Int,ransomUB:Int,ransomLB:Int,terroristLB:Int,terroristUB:Int,
            suicide:Boolean,extended:Boolean,ransom:Boolean,success:Boolean): [attacks]
    }
    `;
    

    function getData(args){
        return new Promise(function(resolve,reject){
        var query;
        var in_queries = myLib.create_in(args,c);
        
            
        var between_queries_arr = myLib.create_between(args,c);
        var between_queries;
        if(between_queries_arr.length>0)
            between_queries = "AND " + between_queries_arr.join(" AND ");
        else{
            between_queries = "";
        }     

        var boolean_queries = myLib.create_boolean(args,c);

        query = "SELECT id as ID,summary as summary,country_txt as country,iyear as year,city as city FROM terrorism WHERE 1=1 "+in_queries.join(" ")+" "+boolean_queries.join(" ") +between_queries;

        console.log(query);
        c.query(query,function(err,result,fields){
            if (err)
                reject({field:"error: " + err.message,value:"code: "+err.code});
            resolve(result);
        });
    })
    }

const resolvers = {
    Query: {
        search: (_,args) =>{
            return getData(args);
 
        },
        maps: ()=>{
            return new Promise(function(resolve,reject){
                var query;
                query = "SELECT latitude as lat,longitude as longi,country_txt as country,city as city FROM terrorism"
                console.log(query);
                c.query(query,function(err,result,fields){
                if (err)
                    reject({field:"error: " + err.message,value:"code: "+err.code});
                resolve(result);
                })
            });
        }   
    },
};

c.on('error', function(err) {
  console.log(err.code); 
});

const server = new ApolloServer({
    schema: buildFederatedSchema ([{typeDefs, resolvers}])
});

server.listen({port}).then(({url}) => {
    console.log(`advancedSearch ready at ${url}`);
});