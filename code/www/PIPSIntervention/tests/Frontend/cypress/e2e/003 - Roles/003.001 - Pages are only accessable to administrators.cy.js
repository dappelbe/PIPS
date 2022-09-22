//-- ================================================================================= --//
//-- Summary :: User Cypress tests - Check that the role
//-- Created :: 21Sep2022
//-- Author  :: Duncan Appelbe (duncan.appelbe@ndorms.ox.ac.uk)
//-- ================================================================================= --//
describe( '003.001 - Role management pages can only be accessed by an admin user', () => {
    context('Authenticated - User', () => {
        it('Setup database', function () {
            cy.pipsDBAddStudy();
            cy.pipsDBAddUser();
        });
        it ('Login as a user and confirm that the admin links cannot be accessed', () => {
            //-- Arrange
            cy.pipsLogin('user');
            //-- Act
            //-- Assert
            cy.url().should('eq', Cypress.config().baseUrl + '/home');
            cy.get('[data-cy=admin-card]').should('not.exist');
            cy.get('[data-cy=admin-home-button]').should('not.exist');
            cy.get('[data-cy=admin-users-button]').should('not.exist');
            cy.get('[data-cy=admin-roles-button]').should('not.exist');
            cy.get('[data-cy=admin-study-button]').should('not.exist');
            cy.get('[data-cy=admin-consent-button]').should('not.exist');
        });
        it ('Login as a user and confirm that the role management page cannot be accessed - error code 403', () => {
            //-- Arrange
            cy.pipsLogin('user');
            //-- Act
            //-- Assert
            cy.request({url: '/roles', failOnStatusCode: false}).its('status').should('equal', 403);
        });
        it ('Login as an admin and confirm that the admin links can be accessed', () => {
            //-- Arrange
            cy.pipsLogin('admin');
            //-- Act
            //-- Assert
            cy.url().should('eq', Cypress.config().baseUrl + '/home');
            cy.pipsAdminToolBarCheck();

        });
        it ('Login as an admin  and confirm that the role management page can be accessed', () => {
            //-- Arrange
            cy.pipsLogin('admin');
            //-- Act
            //-- Assert
            cy.request({url: '/roles', failOnStatusCode: false}).its('status').should('equal', 200);
        });
        it('Tidy database', function() {
            cy.pipsDBClearUser();
            cy.pipsDBClearStudy();
        });
    });
    context( 'Unauthenticated user', () => {
        it('An unauthenticated user cannot access the /roles page and is redirected to the login page', () => {
            cy.visit('/roles');
            cy.url().should('eq', Cypress.config().baseUrl + '/login');
        });
    });
});
