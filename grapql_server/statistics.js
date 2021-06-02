var mysql = require('mysql');
var c = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'terrorism'

});

const { ApolloServer, gql} = require('apollo-server');
const { buildFederatedSchema} = require('@apollo/federation');
const port = 4001;
const  typeDefs = gql`
    type field {
        name: String
    }

    extend type Query {
        fields(field: String!): [field]
    }
    `;
   
const resolvers = {
    Query: {
        fields:(_,args)=>{
            return new Promise(function(resolve,reject){
                c.query("SELECT DISTINCT " + args.field + " as name FROM terrorism", function (err, result, fields) {
                    if (err)
                            reject({name:"error: " + err.message});
                        resolve(result);
                }); 
            });
        }
    },
};

// enable error logging for each connection query
c.on('error', function(err) {
  console.log(err.code); // example : 'ER_BAD_DB_ERROR'
});

const server = new ApolloServer({
    schema: buildFederatedSchema ([{typeDefs, resolvers}])
});

server.listen({port}).then(({url}) => {
    console.log(`Statistics ready at ${url}`);
});