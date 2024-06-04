# API Address IBGE Challenge 🏆

This API is designed to consume the IBGE API and execute various internal directives. This repository is a challenge for a Junior Backend position.

## Requirements

1. **Import your state's IBGE municipalities**:
   - Create communication with the IBGE API.
   - Create an artisan command to import your municipalities.
   - Save the cities in the DB.
   - Example API: [IBGE Municipalities](https://servicodados.ibge.gov.br/api/v1/localidades/estados/BA/municipios)

2. **Create an API for address registration**:
   - Implement endpoints for the four operations: create, update, delete, and list addresses.
   - Save the following data: street address, number, district, and city ID.
   - Implement an endpoint to list cities.
   - Validate received data in create and update address endpoints.
   - Implement unit tests.

3. **Endpoints to test**:
   - `GET /api/municipality` - Get all municipalities.
   - `GET /api/municipality/{id}` - Get municipality by ID.
   - `DELETE /api/municipality/{id}` - Delete municipality by ID.
   - `PUT /api/municipality/{id}` - Update municipality by ID.
   - `POST /api/municipality` - Create a new municipality.

4. **Command to import IBGE municipalities**:
   - Run the command: `php artisan get:data`

## Technology Stack

- **Framework**: Laravel 8
- **Database**: PostgreSQL
- **Company**: Confidential
