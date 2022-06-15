//-- ================================================================================= --//
//-- Summary :: User Cypress tests - User logs in
//-- Created :: 11Apr2022
//-- Author  :: Duncan Appelbe (duncan.appelbe@ndorms.ox.ac.uk)
//-- ================================================================================= --//
describe( '002.001 - User logs in, view pages', () => {
    context('Authenticated - User', () => {
        it('Login as pips@ndorms.ox.ac.uk, confirm that the home page is displayed', () => {
            //-- Arrange
            cy.visit('/login');
            cy.get('[data-cy=login-input-email]')
                .clear()
                .type('pips@ndorms.ox.ac.uk');
            cy.get('[data-cy=login-input-password]')
                .clear()
                .type('MyPassword4PIPs');
            //-- Act
            cy.get('[data-cy=login-submit]').click();
            //-- Assert
            cy.url().should('eq', Cypress.config().baseUrl + '/home');
        });
    });
});
