//-- ================================================================================= --//
//-- Summary :: User Cypress tests - User logs in
//-- Created :: 17Jun2022
//-- Author  :: Duncan Appelbe (duncan.appelbe@ndorms.ox.ac.uk)
//-- ================================================================================= --//
describe( '002.002 - 002.002 User pages are only accessible if logged in', () => {
    context('Authenticated - User', () => {
        it('Checks that the protected page /where cannot be accessed if a user is NOT logged in', () => {
            //-- Arrange
            //-- Act
            cy.visit('/where');
            //-- Assert
            cy.url().should('eq', Cypress.config().baseUrl + '/login');
        });
        it('Checks that the protected page /progress cannot be accessed if a user is NOT logged in', () => {
            //-- Arrange
            //-- Act
            cy.visit('/progress');
            //-- Assert
            cy.url().should('eq', Cypress.config().baseUrl + '/login');
        });
        it('Checks that the protected page /due cannot be accessed if a user is NOT logged in', () => {
            //-- Arrange
            //-- Act
            cy.visit('/due');
            //-- Assert
            cy.url().should('eq', Cypress.config().baseUrl + '/login');
        });
        it('Checks that the protected page /contact cannot be accessed if a user is NOT logged in', () => {
            //-- Arrange
            //-- Act
            cy.visit('/contact');
            //-- Assert
            cy.url().should('eq', Cypress.config().baseUrl + '/login');
        });

    });
});
