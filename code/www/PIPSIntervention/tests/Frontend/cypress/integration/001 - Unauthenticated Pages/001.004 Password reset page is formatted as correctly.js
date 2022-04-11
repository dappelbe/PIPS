//-- ================================================================================= --//
//-- Summary :: Check that the password reset page is formatted correctly
//-- Created :: 10Apr2022
//-- Author  :: Duncan Appelbe (duncan.appelbe@ndorms.ox.ac.uk)
//-- ================================================================================= --//
describe('001.004 - Password reset page is formatted as correctly', () => {
    context('Page formatted correctly', () => {
        it('Opens the password reset page and checks that it is correctly setup', () => {
            cy.visit('/password/reset');
            cy.get('[data-cy=page-logo]').should('be.visible');
            cy.get('[data-cy=page-logo]').should('be.visible');
            cy.get('[data-cy=page-instructions]').should('be.visible');
            cy.get('[data-cy=page-instructions]').should('contain.text', 'Please enter your email address, if you email address matches one we have in the PIPS system, you should receive an email within 5 minutes of pressing submit (please check your junk folder just in case the email goes into your junk folder).');
            cy.get('[data-cy=label-email]').should('be.visible');
            cy.get('[data-cy=label-email]').should('contain.text', 'Email Address');
            cy.get('[data-cy=input-email]').should('be.visible');
            cy.get('[data-cy=input-email]').invoke('attr', 'type').should('eq', 'email');
            cy.get('[data-cy=button-submit]').should('be.visible');
            cy.get('[data-cy=button-submit]').invoke('attr', 'type').should('eq', 'submit');
            cy.get('[data-cy=button-submit]').should('contain.text', 'Send Password Reset Link');

            cy.get('[data-cy=form-error-msg]').should('not.exist');
            cy.get('[data-cy=page-alert]').should('not.exist');
        });
        it('Opens the password reset form, enters an unknown E-Mail address, submits the form and checks that the error message "We can\'t find a user with that email address." is displayed', () => {
            cy.visit('/password/reset');
            cy.get('[data-cy=input-email]').type('blah@blah.blah');
            cy.get('[data-cy=button-submit]').click();
            cy.get('[data-cy=page-alert]').should('not.exist');
            cy.get('[data-cy=form-error-msg]').should('be.visible');
            cy.get('[data-cy=form-error-msg]').should('contain.text', 'We can\'t find a user with that email address.');
        });
        it('Opens the password reset form, enters an known E-Mail address, submits the form and checks that the success message "We have emailed your password reset link!" is displayed', () => {
            cy.visit('/password/reset');
            cy.get('[data-cy=input-email]').type('pips@ndorms.ox.ac.uk');
            cy.get('[data-cy=button-submit]').click();
            cy.get('[data-cy=form-error-msg]').should('not.exist');
            cy.get('[data-cy=page-alert]').should('be.visible');
            cy.get('[data-cy=page-alert]').should('contain.text', 'We have emailed your password reset link!');
        });
    });
});
