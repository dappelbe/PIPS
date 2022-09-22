//-- ================================================================================= --//
//-- Summary :: User Cypress tests - User logs in
//-- Created :: 11Apr2022
//-- Author  :: Duncan Appelbe (duncan.appelbe@ndorms.ox.ac.uk)
//-- ================================================================================= --//
describe( '002.001 - User logs in, view pages', () => {
    context('Authenticated - User', () => {
        it('Setup database', function () {
            cy.pipsDBAddStudy();
            cy.pipsDBAddUser();
        });
        it('Login as test.user@Noidea.com, confirm that the home page is displayed', () => {
            //-- Arrange
            cy.pipsLogin('user');
            //-- Act
            //-- Assert
            cy.url().should('eq', Cypress.config().baseUrl + '/home');
            //-- hdr & footer
            cy.get('[data-cy=navlink-pips-home]').should('be.visible');
            cy.get('#footer').should('be.visible');
            cy.get('#footer').contains('Contact').should('be.visible');
            cy.get('[data-cy=mailto-vb]').should('be.visible');
            cy.get('[data-cy=mailto-da]').should('be.visible');
            cy.get('#footer').contains('Funded By').should('be.visible');
            cy.get('[data-cy=logo-nihr]').should('be.visible');
            cy.get('#footer').contains('Hosted By').should('be.visible');
            cy.get('[data-cy=logo-octru]').should('be.visible');
            cy.get('[data-cy=link_foi]').should('be.visible');
            cy.get('[data-cy=link_privacy]').should('be.visible');
            cy.get('[data-cy=link_accessibility]').should('be.visible');
            //-- Welcome popup
            cy.get('[data-cy=welcome-alert]').should('be.visible');
            cy.get('[data-cy=welcome-hdr]').should('be.visible');
            cy.get('[data-cy=welcome-hdr]').should('contain.text','WELCOME');
            cy.get('[data-cy=w-p1]').should('contain.text','Hello Test User thank you for agreeing to log into and hopefully find this mini website (portal) useful.');
            cy.get('[data-cy=w-p2]').should('contain.text','The last time that you logged in was: ');
            cy.get('[data-cy=w-p3]').should('contain.text','If you wish to send a message to the Central CRAFFT study team – please click');
            cy.get('[data-cy=w-p4]').should('contain.text','If you wish to send a message or give any feedback to the PIPS team');
            cy.get('[data-cy=w-p5]').should('contain.text','Click on the X in the top right-hand corner to clear this message');
            //- Card #1
            cy.get('[data-cy=c1]').should('be.visible');
            cy.get('[data-cy=c1-hdr]').should('contain.text','This is the personalised portal for Test User in the CRAFFT study');
            cy.get('[data-cy=c1-b1]').should('contain.text','CR-RAC-10035');
            cy.get('[data-cy=c1-b1-h3]').should('contain.text','Your CRAFFT trial number');
            cy.get('[data-cy=c1-b2-hdr]').should('contain.text','You were recruited at the Royal Aberdeen Children\'s Hospital RAC.');
            cy.get('[data-cy=c1-b3-hdr]').should('contain.text','You were allocated to the Non-surgical casting arm.');
            cy.get('[data-cy=c1-b4-hdr]').should('contain.text','You are the 1st participant who has agreed to take part in the CRAFFT trial.');
            //-- Card 2
            cy.get('[data-cy=c2]').should('be.visible');
            cy.get('[data-cy=c2-btn1]').should('contain.text','Where am I in my study journey?');
            cy.get('[data-cy=c2-btn2]').should('contain.text','The progress of the CRAFFT study');
            cy.get('[data-cy=c2-btn3]').should('contain.text','What is due for me next?');
            cy.get('[data-cy=c2-btn4]').should('contain.text','How do I contact the CRAFFT study team?');
            //-- card 3
            cy.get('[data-cy=c3]').should('be.visible');
            cy.get('[data-cy=c3-hdr]').should('contain.text','Download');
            cy.get('[data-cy=c3-pips-hdr]').should('contain.text','PIPS');
            cy.get('[data-cy=c3-study-hdr]').should('contain.text','CRAFFT');
        });
        it('Login as test.user@Noidea.com, access the contact details page', () => {
            //-- Arrange
            cy.pipsLogin('user');
            cy.get('[data-cy=contact]').click();
            //-- Assert
            cy.url().should('eq', Cypress.config().baseUrl + '/contact');
            cy.get('[data-cy=navlink-pips-home]').should('be.visible');
            cy.get('#footer').should('be.visible');
            cy.get('[data-cy=main_hdr]').should('be.visible');
            cy.get('[data-cy=main_hdr]').should('contain.text','This is the personalised portal for Test User in the CRAFFT study');
            cy.get('[data-cy=central-study-team]').should('be.visible');
            cy.get('[data-cy=central-study-team]').should('contain.text','The contact details for the central CRAFFT trial team are');
            cy.get('[data-cy=email-label]').should('be.visible');
            cy.get('[data-cy=email-label]').should('contain.text',' E-Mail:');
            cy.get('[data-cy=email-address]').should('be.visible');
            cy.get('[data-cy=email-address]').should('contain.text','crafft@ndorms.ox.ac.uk');
            cy.get('[data-cy=phone-label]').should('be.visible');
            cy.get('[data-cy=phone-label]').should('contain.text',' Phone:');
            cy.get('[data-cy=phone-number]').should('be.visible');
            cy.get('[data-cy=phone-number]').should('contain.text','01865 228929');
            cy.get('[data-cy=address-label]').should('be.visible');
            cy.get('[data-cy=address-label]').should('contain.text',' Address:');
            cy.get('[data-cy=address-text]').should('be.visible');
            cy.get('[data-cy=address-text]').should('contain.text','Oxford Trauma\n' +
                'Kadoorie Centre\n' +
                'NDORMS\n' +
                'University of Oxford\n' +
                'John Radcliffe Hospital\n' +
                'Headley Way\n' +
                'Oxford OX3 9DU');
            cy.get('[data-cy=back-button]').should('be.visible');
            cy.get('[data-cy=back-button]').should('contain.text','Back');
        });
        it( 'Login as test.user@Noidea.com, access the where am I in my study journey', () => {

        });
        it('Tidy database', function() {
            cy.pipsDBClearUser();
            cy.pipsDBClearStudy();
        });
    });
});
