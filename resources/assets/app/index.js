Promise.all([
    import('jquery' /* webpackChunkName: "jquery" */).then((a) => {return a.default}),
    import('bootstrap' /* webpackChunkName: "bootstrap" */)
]).then(([jQuery]) => {

});
