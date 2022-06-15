//-- ================================================================================= --//
//-- Summary :: Check that the login page is formatted correctly
//-- Created :: 10Apr2022
//-- Author  :: Duncan Appelbe (duncan.appelbe@ndorms.ox.ac.uk)
//-- ================================================================================= --//
describe('001.003 - Login form is correctly formatted', () => {
   context('Page formatted correctly', () => {
       it('Opens the login page and checks that it is correctly setup', () => {
          cy.visit('/');
          //-- Nav bar
          cy.get('[data-cy=link-login]').should('be.visible');
          //-- Form
          cy.get('[data-cy=login-logo-pips]').should('be.visible');
           cy.get('[data-cy=login-title]').should('be.visible');
           cy.get('[data-cy=login-title]').should('contain.text', 'Welcome to the OCTRU Participant Information PortalS');
           cy.get('[data-cy=login-instruction]').should('be.visible');
           cy.get('[data-cy=login-instruction]').should('contain.text', 'Please enter your email address and PIPS password to access your Portal');
           cy.get('[data-cy=login-input-email-label]').should('be.visible');
           cy.get('[data-cy=login-input-email-label]').should('contain.text', 'Email Address');
           cy.get('[data-cy=login-input-email]').should('be.visible');
           cy.get('[data-cy=login-input-email]').invoke('attr', 'type').should('eq', 'email');
           cy.get('[data-cy=login-input-password-label]').should('be.visible');
           cy.get('[data-cy=login-input-password-label]').should('contain.text', 'Password');
           cy.get('[data-cy=login-input-password]').should('be.visible');
           cy.get('[data-cy=login-input-password]').invoke('attr', 'type').should('eq', 'password');
           cy.get('[data-cy=login-input-remember_me-label]').should('be.visible');
           cy.get('[data-cy=login-input-remember_me-label]').should('contain.text', 'Remember Me');
           cy.get('[data-cy=login-input-remember_me]').should('be.visible');
           cy.get('[data-cy=login-input-remember_me]').invoke('attr', 'type').should('eq', 'checkbox');
           cy.get('[data-cy=login-submit]').should('be.visible');
           cy.get('[data-cy=login-submit]').invoke('attr', 'type').should('eq', 'submit');
           cy.get('[data-cy=login-submit]').should('contain.text', 'Login');
           cy.get('[data-cy=login-forgot-password]').should('be.visible');
           cy.get('[data-cy=login-forgot-password]').should('contain.text', 'Forgot Your Password?');
       });
   }) ;
});
