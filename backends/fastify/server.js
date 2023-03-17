const fastify = require('fastify')({ logger: true });

fastify.get('/', async (request, response) => {
    return { status: 'ok' };
});

const start = async () => {
    try {
        await fastify.listen({ port: 3001 });
    } catch (err) {
        fastify.log.error(err);
        process.exit(1);
    }
};

start();

