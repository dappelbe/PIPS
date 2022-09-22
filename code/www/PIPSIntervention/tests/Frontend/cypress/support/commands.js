// ***********************************************
// This example commands.js shows you how to
// create various custom commands and overwrite
// existing commands.
//
// For more comprehensive examples of custom
// commands please read more here:
// https://on.cypress.io/custom-commands
// ***********************************************
import 'cypress-mailhog';

//-- PIPS LOGIN
Cypress.Commands.add('pipsLogin', (key) => {
    cy.visit('/login');
    cy.get('[data-cy=login-input-email]')
        .clear()
        .type(Cypress.env(key).email);
    cy.get('[data-cy=login-input-password]')
        .clear()
        .type(Cypress.env(key).password);
    //-- Act
    cy.get('[data-cy=login-submit]').click();
});

//-- Add user to database
Cypress.Commands.add('pipsDBAddUser', () => {
    cy.task('queryDb', `INSERT INTO users (id, name, email, email_verified_at,
                                                   password, remember_token, created_at, updated_at,
                                                   last_login_at, last_login_ip, randomisation_number,
                                                   studyid) VALUES (2, 'Test User',
                                                                                  'test.user@Noidea.com', NULL,
                                                                                  '$2y$10$8T9RWIS3n3WQPhKArjL/H.HhDs.PgNfJ8/usl/l/6ktInJvksbe62',
                                                                                  'Vp5Jh0f1beK5qDBnWCwpklr2mUmt6LwL2uqGhAKF4iVIe3JACKQRLSet5vLZ',
                                                                                  '2022-04-22 12:42:37',
                                                                                  '2022-09-20 16:15:20',
                                                                                  '2022-09-20 17:15:20',
                                                                                  '195.213.65.98',
                                                                                  'CR-RAC-10035',
                                                                                  1);`).then((result) => {
        expect(result.affectedRows).to.equal(1)
    });
});
Cypress.Commands.add('pipsDBClearUser', () => {
    cy.task('queryDb', 'DELETE FROM users where id = 2;').then((result) => {
        expect(result.affectedRows).to.equal(1)
    });
});

//-- Study details to database
Cypress.Commands.add('pipsDBAddStudy', () => {
    cy.task('queryDb', `INSERT INTO studydetails (id, created_at, updated_at, studyname,
                                                          apiurl, apikey, studylogo, studyemail,
                                                          studyphone, studyaddress, studyaccruallink,
                                                          uploadedpis, studyrandomisationreportid,
                                                          randonumfield, allocationfield, sitenamefield,
                                                          studystatusreportid, expectedrecruits,
                                                          randodatefield) VALUES (1, '2022-04-22 10:42:53',
                                                                                  '2022-04-22 10:42:53', 'CRAFFT',
                                                                                  'https://redcap-cctr.octru.ox.ac.uk/api/',
                                                                                  'A71604FCD642E04E82712BAFBDFE09AF',
                                                                                  'signature.png',
                                                                                  'crafft@ndorms.ox.ac.uk',
                                                                                  '01865 228929',
                                                                                  'Oxford Trauma\\r\\nKadoorie Centre\\r\\nNDORMS\\r\\nUniversity of Oxford\\r\\nJohn Radcliffe Hospital\\r\\nHeadley Way\\r\\nOxford OX3 9DU',
                                                                                  'https://kadoorie.octru.ox.ac.uk/CRAFFT_SIMS/Recruitment',
                                                                                  1, 579, 'ra_subj_id',
                                                                                  'ra_treat_alloc', 'ra_cte_id', 784,
                                                                                  784, 'ra_date');`).then((result) => {
        expect(result.affectedRows).to.equal(1)
    });

});
Cypress.Commands.add('pipsDBClearStudy', () => {
    cy.task('queryDb', 'DELETE FROM studydetails where id = 1;').then((result) => {
        expect(result.affectedRows).to.equal(1)
    });
});

//-- Admin toolbar exists
Cypress.Commands.add('pipsAdminToolBarCheck', () => {
    cy.get('[data-cy=admin-card]').should('exist');
    cy.get('[data-cy=admin-home-button]').should('exist');
    cy.get('[data-cy=admin-users-button]').should('exist');
    cy.get('[data-cy=admin-roles-button]').should('exist');
    cy.get('[data-cy=admin-study-button]').should('exist');
    cy.get('[data-cy=admin-consent-button]').should('exist');
});
