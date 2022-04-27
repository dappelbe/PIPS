//-- ================================================================================= --//
//-- Summary :: Unauthenticated Cypress tests
//-- Created :: 27Apr2022
//-- Author  :: Duncan Appelbe (duncan.appelbe@ndorms.ox.ac.uk)
//-- ================================================================================= --//
describe('001.006 - Private pages redirect to /login when not authenticated', () => {
    context('Unauthenticated', () => {
        it('Accesses /home and checks to see that we are redirected to the login page', () => {
            cy.visit('/home');
            cy.url().should('eq', Cypress.config().baseUrl + '/login');
        });
        it('Accesses /progress and checks to see that we are redirected to the login page', () => {
            cy.visit('/progress');
            cy.url().should('eq', Cypress.config().baseUrl + '/login');
        });
        it('Accesses /due and checks to see that we are redirected to the login page', () => {
            cy.visit('/due');
            cy.url().should('eq', Cypress.config().baseUrl + '/login');
        });
        it('Accesses /contact and checks to see that we are redirected to the login page', () => {
            cy.visit('/contact');
            cy.url().should('eq', Cypress.config().baseUrl + '/login');
        });
        it('Accesses /consent/list and checks to see that we are redirected to the login page', () => {
            cy.visit('/consent/list');
            cy.url().should('eq', Cypress.config().baseUrl + '/login');
        });
    });
});
