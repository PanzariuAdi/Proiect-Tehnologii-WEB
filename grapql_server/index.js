var mysql = require('mysql');
var c = mysql.createConnection({
  host     : 'localhost',
 // port     : '3306',
  user     : 'root',
  password : '',
  database : 'terrorism'

});

const { ApolloServer, gql} = require('apollo-server');

const  typeDefs = gql`

    type Book {
        title: String
        author: String
    }
    
    type Query {
        books: [Book]
        booksByAuthor(field: String!): String!
        booksByName: [Book]
    }
    `;

    const books = [
        {
            title: 'Plumbu ma-sii',
            author: 'George Bacovia',
        },
        {
            title: 'Capra cu trei iezi',
            author: 'Ion Creanga',
        },
        {
            title: 'Luceafarul',
            author: 'Mihai Eminescu',
        }
    ];

var returnSelf = function(args){
    console.log(args);
    return args;
}    

var names = "Luceafarul";

const resolvers = {
    Query: {
        books: () => books,
        booksByAuthor: returnSelf,
        booksByName: () => {
            var result = [];
            books.forEach(element =>{
              if (element.title == names) {
                  result.push(element);
              }  
            });
            return result;
        }
    },
};

// enable error logging for each connection query
c.on('error', function(err) {
  console.log(err.code); // example : 'ER_BAD_DB_ERROR'
});

const server = new ApolloServer({typeDefs, resolvers});

server.listen().then(({url}) => {
    console.log(`Server ready at ${url}`);
});