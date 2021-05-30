const { ApolloServer, gql} = require('apollo-server');

const { ApolloGateway } = require('@apollo/gateway');

const gateway = new ApolloGateway({
    serviceList : [{name: "statistics",url:"http://localhost:4001/"}]
})
 
const server = new ApolloServer({gateway,subscriptions:false});

server.listen().then(({url}) => {
    console.log(`Server ready at ${url}`);
});