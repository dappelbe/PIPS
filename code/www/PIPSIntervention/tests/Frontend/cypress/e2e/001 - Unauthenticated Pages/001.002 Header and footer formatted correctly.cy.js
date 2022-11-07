//-- ================================================================================= --//
//-- Summary :: Check that the header and footer are formatted correctly
//-- Created :: 10Apr2022
//-- Author  :: Duncan Appelbe (duncan.appelbe@ndorms.ox.ac.uk)
//-- ================================================================================= --//
describe( '001.002 - Header and footer formatted correctly', () => {
    context('Unauthenticated', () => {
        it('Accesses the home page and checks that the header and footer are formatted as expected.', () =>{
            cy.visit('/');
            //-- =========================================== --//
            //-- Header
            //-- =========================================== --//
            //-- PIPS Logo
            cy.get('[data-cy=navlink-pips-home]')
                .should('be.visible');
            //-- =========================================== --//
            //-- Footer
            //-- =========================================== --//
            cy.get('#footer')
                .should('be.visible');
            cy.get('#footer')
                .contains('Contact')
                .should('be.visible');
            cy.get('[data-cy=mailto-vb]')
                .should('be.visible');
            cy.get('[data-cy=mailto-da]')
                .should('be.visible');
            cy.get('#footer')
                .contains('Funded By')
                .should('be.visible');
            cy.get('[data-cy=logo-nihr]')
                .should('be.visible');
            cy.get('#footer')
                .contains('Hosted By')
                .should('be.visible');
            cy.get('[data-cy=logo-octru]')
                .should('be.visible');
            cy.get('[data-cy=link_foi]')
                .should('be.visible');
            cy.get('[data-cy=link_privacy]')
                .should('be.visible');
            cy.get('[data-cy=link_accessibility]')
                .should('be.visible');

        })
    });
});
