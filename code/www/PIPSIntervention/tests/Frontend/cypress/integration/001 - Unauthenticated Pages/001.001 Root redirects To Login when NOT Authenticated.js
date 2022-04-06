//-- ================================================================================= --//
//-- Summary :: Unauthenticated Cypress tests
//-- Created :: 05Apr2022
//-- Author  :: Duncan Appelbe (duncan.appelbe@ndorms.ox.ac.uk)
//-- ================================================================================= --//
describe('001.001 - / redirects to /login when not authenticated', () => {
    context('Unauthenticated', () => {
        it('Accesses / and checks to see that we are redirected to the login page', () => {
            cy.visit('http://localhost');
            cy.url().should('eq', 'http://localhost/login');
        });
    });
});
