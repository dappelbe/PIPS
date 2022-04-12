//-- ================================================================================= --//
//-- Summary :: Check that the password reset page is formatted correctly
//-- Created :: 10Apr2022
//-- Author  :: Duncan Appelbe (duncan.appelbe@ndorms.ox.ac.uk)
//-- ================================================================================= --//
describe('001.005 Password Reset E-Mail is formatted correctly', () => {
    context('Page formatted correctly', () => {
        it('(1) Deletes all existing E-Mails in Mailhog,\r\n (2) Opens the password reset page,\r\n (3) Requests a password reset,\r\n (4) Opens Mailhog and checks that the e-mail has been sent.', () => {
            //-- Arrange
            cy.mhDeleteAll();
            cy.visit('/password/reset');
            cy.get('[data-cy=input-email]').type('pips@ndorms.ox.ac.uk');
            //-- Act
            cy.get('[data-cy=button-submit]').click();
            //-- Assert
            cy.get('[data-cy=page-alert]').should('be.visible');
            cy.mhGetMailsBySubject('Reset Password Notification')
                .should('have.length', 1);
            cy.mhGetAllMails()
                .mhFirst()
                .mhGetSender()
                .should('eq', 'pips@ndorms.ox.ac.uk');
            cy.mhGetAllMails()
              .mhFirst()
              .mhGetSubject()
              .should('eq', 'Reset Password Notification');
            cy.mhGetAllMails()
                .mhFirst()
                .mhGetBody()
                .should('contain', 'Hello!');
            cy.mhGetAllMails()
                .mhFirst()
                .mhGetBody()
                .should('contain', 'You are receiving this email be=\r\ncause we received a password reset request for your account.');
            cy.mhGetAllMails()
                .mhFirst()
                .mhGetBody()
                .should('contain', 'This passw=\r\nord reset link will expire in 60 minutes.');
            cy.mhGetAllMails()
                .mhFirst()
                .mhGetBody()
                .should('contain', 'If you did not request a pas=\r\nsword reset, no further action is required.');
            cy.mhGetAllMails()
                .mhFirst()
                .mhGetBody()
                .should('contain', 'Regards,');
            cy.mhGetAllMails()
                .mhFirst()
                .mhGetBody()
                .should('contain', 'PIPs');
            cy.mhGetAllMails()
                .mhFirst()
                .mhGetBody()
                .should('contain', "If you're having trouble clicking the");
            cy.mhGetAllMails()
                .mhFirst()
                .mhGetBody()
                .should('contain', "button, copy and paste the URL below");
            cy.mhGetAllMails()
                .mhFirst()
                .mhGetBody()
                .should('contain', 'into your web browser:');
        });
    });
});
