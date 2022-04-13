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
                .invoke('replaceAll', '=\r\n', '')
                .invoke('replaceAll', '\r\n', '')
                .should('contain', 'Hello!')
                .should('contain', 'You are receiving this email because we received a password reset request for your account.')
                .should('contain', 'This password reset link will expire in 60 minutes.')
                .should('contain', 'If you did not request a password reset, no further action is required.')
                .should('contain', 'Regards,')
                .should('contain', 'PIPs')
                .should('contain', "If you're having trouble clicking the")
                .should('contain', "button, copy and paste the URL below")
                .should('contain', 'into your web browser:');
        });
    });
});
