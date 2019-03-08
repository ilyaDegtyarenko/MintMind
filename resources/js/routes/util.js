/**
 * Search and implement route middleware.
 *
 * @param router
 * @param to
 * @param next
 * @returns {*}
 */
export function routeMiddleware({router, to, next}) {
    if (!to.meta.middleware) return next();

    const middleware = Array.isArray(to.meta.middleware)
        ? to.meta.middleware
        : [to.meta.middleware];

    let context = {
        next,
        router
    };

    for (let index in middleware) {
        if (middleware.hasOwnProperty(index)) {
            middleware[index](context);
        }
    }
}

/**
 * Set page title.
 *
 * @param to
 * @param next
 * @returns {*}
 */
export function setPageTitle(to, next) {
    const appName = window.translate.app_name || '';

    let title = ((to.meta && to.meta.title) ? to.meta.title : null);

    document.title = appName + (title ? (' - ' + title) : '');

    return next();
}