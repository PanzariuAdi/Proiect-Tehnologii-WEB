const { ApolloServer, gql} = require('apollo-server');
const { buildFederatedSchema} = require('@apollo/federation');
const myLib = require("./utility/statistic-functions");
const port = 4001;

var mysql = require('mysql');
var c = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'terrorism'

});

const  typeDefs = gql`

    type field {
        value: String
    }
    type statistic{
        field: String
        value: Int
    }
    
    extend type Query {
        fields(field: String!): [field] 
        statistics(xaxis:String!, yaxis:String!,
            countries:[String],regions:[String],cities:[String],states:[String],motives:[String],gangs:[String],wepTypes:[String],wepSubtypes:[String],lossExtents:[String],months:[Int],years:[Int],attackTypes:[String],targetNatalities:[String],
            attackUB:Int,attackLB:Int,casualitiesUB:Int,casualitiesLB:Int,woundedUB:Int,woundedLB:Int,lossUB:Int,lossLB:Int,ransomUB:Int,ransomLB:Int,terroristLB:Int,terroristUB:Int,
            suicide:Boolean,extended:Boolean,ransom:Boolean,success:Boolean): [statistic]
    }
    `;
    

    async function getData(args){
        return new Promise(function(resolve,reject){
        var query;
        var in_queries = myLib.create_in(args,c);
        
            
        var between_queries_arr = myLib.create_between(args,c);
        var between_queries;
        if(between_queries_arr.length>0)
            between_queries = "HAVING " + between_queries_arr.join(" AND ");
        else{
            between_queries = "";
        }     

        var boolean_queries = myLib.create_boolean(args,c);

        switch(args.yaxis){
            case 'attacks':
                query = "SELECT DISTINCT "+c.escapeId(args.xaxis)+" as field, count(*) as value FROM terrorism WHERE lower("+c.escapeId(args.xaxis)+") not like '%unknown%' and "+c.escapeId(args.xaxis)+" not like '' "+in_queries.join(" ")+" "+boolean_queries.join(" ")+" group by "+c.escapeId(args.xaxis)+" "+between_queries+" order by count(*) desc ";
                break; 
            default:
                query = "SELECT DISTINCT "+c.escapeId(args.xaxis)+" as field, SUM("+c.escapeId(args.yaxis)+") as value FROM terrorism WHERE lower("+c.escapeId(args.xaxis)+") not like '%unknown%' and "+c.escapeId(args.xaxis)+" not like ''"+in_queries.join(" ")+" "+ between_queries+" "+boolean_queries.join(" ")+" group by "+c.escapeId(args.xaxis)+"  order by SUM("+c.escapeId(args.yaxis)+") desc ";
                break;         
                  
        }
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
        fields:(_,args)=>{
          return new Promise(function(resolve,reject){
                c.query("SELECT DISTINCT " + c.escapeId(args.field) + " as value FROM terrorism WHERE "+c.escapeId(args.field)+" not like ''", function (err, result, fields) {
                    if (err)
                        resolve({name:"error: " + err.message});
                    resolve(result);
                }); 
            })
        },
        statistics: (_,args) =>{
             return getData(args);
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
    console.log(`Statistics ready at ${url}`);
});