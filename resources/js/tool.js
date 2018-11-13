Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'nova-ux',
            path: '/nova-ux',
            component: require('./components/Tool'),
        },
    ])
})
