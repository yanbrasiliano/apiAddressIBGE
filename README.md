## API Address IBGE Challenge 🏆 
This API aims to consume the IBGE API and execute some directives internally. This repository is a challenge for a Junior Backend position.

#### 1. import your state's IBGE municipalities (https://servicodados.ibge.gov.br/api/v1/localidades/estados/BA/municipios)
  * Create communication with the IBGE API.
  * Create an artisan command to import your municipalities.
  * Save the cities in the DB.

#### 2. Create an API for address registration
  * It needs to have endpoints for the 4 operations: create address, update address, delete address and list the addresses.
  * The data to be saved will be: street address, number, district and the city ID.
  * You must have an endpoint to list cities.
  * For the create address and update address endpoints it is relevant to validate the data received in the form request.
  * Also implement Unitary Tests.

#### 3. Endpoints to test
  * GET: url/api/municipality --- get all municipalities.
  * GET: url/api/municipality/{id} --- get municipalities by id.
  * DELETE: url/api/municipality/{id} --- delete municipalities.
  * PUT: url/api/municipality/{id} --- update municipalities.
  * POST: url/api/municipality --- create municipalities.
  
#### 4. Command to import municipalities IBGE.
  * php artisan get:data

<br>

Stack: Laravel 8.<br>
Database: PostgresSQL.<br>
Company: Confidential.
