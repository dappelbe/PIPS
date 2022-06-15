//-- ================================================================================= --//
//-- Summary :: Consent Form is correctly formatted Cypress tests
//-- Created :: 27Apr2022
//-- Author  :: Duncan Appelbe (duncan.appelbe@ndorms.ox.ac.uk)
//-- ================================================================================= --//
describe('001.007 Consent Form is correctly formatted', () => {
    context('Unauthenticated', () => {
        it('Accesses /consent/PIPS and checks that the page is correctly formatted', () => {
            cy.visit('/consent/PIPS');
            //-- ====================================================================
            //-- Page Header
            //-- ====================================================================
            cy.get('[data-cy=logo-oxford]').should('be.visible');
            cy.get('[data-cy=logo-oxford]').invoke('attr', 'src').should('contain', 'images/UoOLogo_sm.png');
            cy.get('[data-cy=logo-pips]').should('be.visible');
            cy.get('[data-cy=logo-pips]').invoke('attr', 'src').should('contain', 'images/pips-logo.png');
            cy.get('[data-cy=page-title]')
                .should('be.visible')
                .should('have.text','PARTICIPANT CONSENT FORM');
            cy.get('[data-cy=page-subtitle]')
                .should('be.visible')
                .should('contain.text','Is a participant information portal (a mini website) helpful to participants that have agreed to take part in a clinical study or trial?');
            //-- ====================================================================
            //-- End Page Header
            //-- ====================================================================

            //-- ====================================================================
            //-- Alert
            //-- ====================================================================
            cy.get('[data-cy=page-alert]').should('not.exist');

            //-- ====================================================================
            //-- Clause #1
            //-- ====================================================================
            cy.get('[data-cy=q1]').should('be.visible');
            cy.get('[data-cy=q1]')
                .should( 'contain.text', '1.   I confirm that I have read the information sheet dated 15Dec2021 (version 0.1)\n' +
                    '                                        for this study. I have had the opportunity to consider the information,\n' +
                    '                                        ask questions and have had these answered satisfactorily.')
            cy.get('[data-cy=pis-yes]').should('be.visible');
            cy.get('[data-cy=pis-yes]').invoke('attr', 'type').should('eq', 'radio');
            cy.get('[data-cy=pis-yes]').invoke('attr', 'name').should('eq', 'pis');
            cy.get('[data-cy=pis-yes]').invoke('attr', 'value').should('eq', '1');
            cy.get('[data-cy=pis-yes-label]').should('be.visible');
            cy.get('[data-cy=pis-yes-label]').should('contain.text', 'yes');
            cy.get('[data-cy=pis-no]').should('be.visible');
            cy.get('[data-cy=pis-no]').invoke('attr', 'type').should('eq', 'radio');
            cy.get('[data-cy=pis-no]').invoke('attr', 'name').should('eq', 'pis');
            cy.get('[data-cy=pis-no]').invoke('attr', 'value').should('eq', '0');
            cy.get('[data-cy=pis-no-label]').should('be.visible');
            cy.get('[data-cy=pis-no-label]').should('contain.text', 'no');

            //-- ====================================================================
            //-- Clause #2
            //-- ====================================================================
            cy.get('[data-cy=q2]').should('be.visible');
            cy.get('[data-cy=q2]')
                .should( 'contain.text', '2.   I understand that my participation is voluntary and that I am free to withdraw at any time without giving any reason, without my medical care or legal rights being affected.')
            cy.get('[data-cy=voluntary-yes]').should('be.visible');
            cy.get('[data-cy=voluntary-yes]').invoke('attr', 'type').should('eq', 'radio');
            cy.get('[data-cy=voluntary-yes]').invoke('attr', 'name').should('eq', 'voluntary');
            cy.get('[data-cy=voluntary-yes]').invoke('attr', 'value').should('eq', '1');
            cy.get('[data-cy=voluntary-yes-label]').should('be.visible');
            cy.get('[data-cy=voluntary-yes-label]').should('contain.text', 'yes');
            cy.get('[data-cy=voluntary-no]').should('be.visible');
            cy.get('[data-cy=voluntary-no]').invoke('attr', 'type').should('eq', 'radio');
            cy.get('[data-cy=voluntary-no]').invoke('attr', 'name').should('eq', 'voluntary');
            cy.get('[data-cy=voluntary-no]').invoke('attr', 'value').should('eq', '0');
            cy.get('[data-cy=voluntary-no-label]').should('be.visible');
            cy.get('[data-cy=voluntary-no-label]').should('contain.text', 'no');

            //-- ====================================================================
            //-- Clause #3
            //-- ====================================================================
            cy.get('[data-cy=q3]').should('be.visible');
            cy.get('[data-cy=q3]')
                .should( 'contain.text', '3.   I understand that data collected during the study may be looked at by\n' +
                    '                                        individuals from University of Oxford where it is relevant to my taking part in\n' +
                    '                                        this research. I give permission for these individuals to have access to my records.')
            cy.get('[data-cy=data-yes]').should('be.visible');
            cy.get('[data-cy=data-yes]').invoke('attr', 'type').should('eq', 'radio');
            cy.get('[data-cy=data-yes]').invoke('attr', 'name').should('eq', 'data');
            cy.get('[data-cy=data-yes]').invoke('attr', 'value').should('eq', '1');
            cy.get('[data-cy=data-yes-label]').should('be.visible');
            cy.get('[data-cy=data-yes-label]').should('contain.text', 'yes');
            cy.get('[data-cy=data-no]').should('be.visible');
            cy.get('[data-cy=data-no]').invoke('attr', 'type').should('eq', 'radio');
            cy.get('[data-cy=data-no]').invoke('attr', 'name').should('eq', 'data');
            cy.get('[data-cy=data-no]').invoke('attr', 'value').should('eq', '0');
            cy.get('[data-cy=data-no-label]').should('be.visible');
            cy.get('[data-cy=data-no-label]').should('contain.text', 'no');

            //-- ====================================================================
            //-- Clause #4
            //-- ====================================================================
            cy.get('[data-cy=q4]').should('be.visible');
            cy.get('[data-cy=q4]')
                .should( 'contain.text', '4.   I agree to take part in the PIPS study.')
            cy.get('[data-cy=agree-yes]').should('be.visible');
            cy.get('[data-cy=agree-yes]').invoke('attr', 'type').should('eq', 'radio');
            cy.get('[data-cy=agree-yes]').invoke('attr', 'name').should('eq', 'agree');
            cy.get('[data-cy=agree-yes]').invoke('attr', 'value').should('eq', '1');
            cy.get('[data-cy=agree-yes-label]').should('be.visible');
            cy.get('[data-cy=agree-yes-label]').should('contain.text', 'yes');
            cy.get('[data-cy=agree-no]').should('be.visible');
            cy.get('[data-cy=agree-no]').invoke('attr', 'type').should('eq', 'radio');
            cy.get('[data-cy=agree-no]').invoke('attr', 'name').should('eq', 'agree');
            cy.get('[data-cy=agree-no]').invoke('attr', 'value').should('eq', '0');
            cy.get('[data-cy=agree-no-label]').should('be.visible');
            cy.get('[data-cy=agree-no-label]').should('contain.text', 'no');


        });
    });
});
