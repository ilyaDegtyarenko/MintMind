export function auth({next, router}) {
    if (!localStorage.getItem('[token]')) {
        return router.push({name: 'login'});
    }

    return next();
}

export function guest({next, router}) {
    if (localStorage.getItem('[token]')) {
        return router.push({name: 'index'});
    }

    return next();
}