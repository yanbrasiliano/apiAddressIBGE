## API Address IBGE Challenge 🏆 
This API aims to consume the IBGE API and execute some directives internally. This repository is a challenge for a Junior Backend position.

#### 1. import your state's IBGE municipalities (https://servicodados.ibge.gov.br/api/docs/localidades#api-Municipios-estadosUFMunicipiosGet)
  * Create communication with the IBGE API.
  * Create an artisan command to import your municipalities.
  * Save the cities in the DB.

#### 2. Create an API for address registration
  * It needs to have endpoints for the 4 operations: create address, update address, delete address and list the addresses.
  * The data to be saved will be: street address, number, district and the city ID.
  * You must have an endpoint to list cities.
  * For the create address and update address endpoints it is relevant to validate the data received in the form request.
  * Also implement Unitary Tests.
<br>
Stack: Laravel 8.<br>
Database: PostgresSQL.<br>
Company: Confidential.
