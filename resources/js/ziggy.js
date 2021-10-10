const Ziggy = {"url":"https:\/\/lfgdestiny.ga","port":null,"defaults":{},"routes":{"debugbar.openhandler":{"uri":"_debugbar\/open","methods":["GET","HEAD"]},"debugbar.clockwork":{"uri":"_debugbar\/clockwork\/{id}","methods":["GET","HEAD"]},"debugbar.telescope":{"uri":"_debugbar\/telescope\/{id}","methods":["GET","HEAD"]},"debugbar.assets.css":{"uri":"_debugbar\/assets\/stylesheets","methods":["GET","HEAD"]},"debugbar.assets.js":{"uri":"_debugbar\/assets\/javascript","methods":["GET","HEAD"]},"debugbar.cache.delete":{"uri":"_debugbar\/cache\/{key}\/{tags?}","methods":["DELETE"]},"login":{"uri":"login","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.update":{"uri":"reset-password","methods":["POST"]},"register":{"uri":"register","methods":["GET","HEAD"]},"user-profile-information.update":{"uri":"user\/profile-information","methods":["PUT"]},"user-password.update":{"uri":"user\/password","methods":["PUT"]},"password.confirm":{"uri":"user\/confirm-password","methods":["GET","HEAD"]},"password.confirmation":{"uri":"user\/confirmed-password-status","methods":["GET","HEAD"]},"two-factor.login":{"uri":"two-factor-challenge","methods":["GET","HEAD"]},"two-factor.enable":{"uri":"user\/two-factor-authentication","methods":["POST"]},"two-factor.disable":{"uri":"user\/two-factor-authentication","methods":["DELETE"]},"two-factor.qr-code":{"uri":"user\/two-factor-qr-code","methods":["GET","HEAD"]},"two-factor.recovery-codes":{"uri":"user\/two-factor-recovery-codes","methods":["GET","HEAD"]},"terms.show":{"uri":"terms-of-service","methods":["GET","HEAD"]},"policy.show":{"uri":"privacy-policy","methods":["GET","HEAD"]},"profile.show":{"uri":"user\/profile","methods":["GET","HEAD"]},"other-browser-sessions.destroy":{"uri":"user\/other-browser-sessions","methods":["DELETE"]},"current-user-photo.destroy":{"uri":"user\/profile-photo","methods":["DELETE"]},"current-user.destroy":{"uri":"user","methods":["DELETE"]},"activity.index":{"uri":"activity","methods":["GET","HEAD"]},"activity.create":{"uri":"activity\/create","methods":["GET","HEAD"]},"activity.store":{"uri":"activity","methods":["POST"]},"activity.edit":{"uri":"activity\/{activity}\/edit","methods":["GET","HEAD"],"bindings":{"activity":"id"}},"activity.update":{"uri":"activity\/{activity}","methods":["PUT","PATCH"],"bindings":{"activity":"id"}},"activity.destroy":{"uri":"activity\/{activity}","methods":["DELETE"],"bindings":{"activity":"id"}},"activity.show":{"uri":"activity\/view\/{slug}","methods":["GET","HEAD"]},"activity.join":{"uri":"activity\/join\/{id}","methods":["POST"]},"activity.quit":{"uri":"activity\/quit\/{id}","methods":["POST"]},"category.index":{"uri":"category","methods":["GET","HEAD"]},"category.create":{"uri":"category\/create","methods":["GET","HEAD"]},"category.store":{"uri":"category","methods":["POST"]},"category.edit":{"uri":"category\/{category}\/edit","methods":["GET","HEAD"],"bindings":{"category":"id"}},"category.update":{"uri":"category\/{category}","methods":["PUT","PATCH"],"bindings":{"category":"id"}},"category.destroy":{"uri":"category\/{category}","methods":["DELETE"],"bindings":{"category":"id"}}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
