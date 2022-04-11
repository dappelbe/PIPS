//-- ================================================================================= --//
//-- Summary :: Check that the password reset page is formatted correctly
//-- Created :: 10Apr2022
//-- Author  :: Duncan Appelbe (duncan.appelbe@ndorms.ox.ac.uk)
//-- ================================================================================= --//
describe('001.005 Password Reset E-Mail is formatted correctly', () => {
    context('Page formatted correctly', () => {
        it('Deletes all existing E-Mails in Mailhog, then opens the password reset page, requests a password reset, opens Mailhog and checks that the e-mail has been sent.', () => {
            cy.mhDeleteAll();
            cy.visit('/password/reset');
            cy.get('[data-cy=input-email]').type('pips@ndorms.ox.ac.uk');
            cy.get('[data-cy=button-submit]').click();
            cy.get('[data-cy=page-alert]').should('be.visible');
            cy.mhGetMailsBySubject('Reset Password Notification')
                .should('have.length', 1);
        });
    });
});
