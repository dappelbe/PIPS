const { defineConfig } = require('cypress')

module.exports = defineConfig({
  mailHogUrl: 'http://localhost:8025',
  e2e: {
    // We've imported your old cypress plugins here.
    // You may want to clean this up later by importing these.
    setupNodeEvents(on, config) {
      return require('./cypress/plugins/index.js')(on, config)
    },
    baseUrl: 'http://localhost',
      env: {
        db: {
            "host" : "127.0.0.1",
            "user" : "myuser",
            "password" : "myuser",
            "database" : "default"
        }
      }
  },
})
