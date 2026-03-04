# **Casos de Prueba - Contratos**
Estos casos de prueba describen paso a paso lo que los test deben realizar 

<hr style="border: 4px solid #000;">

## **Caso de Prueba#1**
### **ID del Caso de Prueba**
___
CP-CONTRATO-001
### **Título de la Prueba**
___
Creación de un Contrato Exitoso
### **Módulo / Característica**
___
Contratos – Crear Contrato
### **Descripción**
___
Verificar que se puede crear un contrato y asociarlo a un colaborador existente.
### **Precondiciones**
___
1. Usuario autenticado.
2. Colaborador existente en la base de datos.
### **Pasos para la Ejecución**
___
1. Usuario Logueado.
2. Acceder al módulo contratos.
3. Dirigirse a Nuevo Contrato.
4. Ingresar los datos correctos de tipo json, incluyendo el ID del colaborador existente.
5. Guardar.
6. Validación del sistema.
### **Datos de Entrada**
```json
[
    'contract_type' => 'Indefinido',
    'start_date' => '2024-01-01',
    'end_date' => null,
    'salary' => 3000000,
    'status' => 'Activo',
    'collaborator_id' => 1
]
```
### **Resultado Esperado**
___
Verificar que el contrato se crea correctamente en la base de datos y está asociado al colaborador.
### **Resultado Real**
___
### **Estado**
___
PASA


<hr style="border: 4px solid #000;">

## **Caso de Prueba#2**
### **ID del Caso de Prueba**
___
CP-CONTRATO-002
### **Título de la Prueba**
___
Creación de un Contrato con Datos Inválidos
### **Módulo / Característica**
___
Contratos – Crear Contrato
### **Descripción**
___
Verificar que no se puede crear un contrato para un colaborador inexistente.
### **Precondiciones**
___
1. Usuario autenticado.
2. Colaborador inexistente en la base de datos.
### **Pasos para la Ejecución**
___
1. Usuario Logueado.
2. Acceder al módulo contratos.
3. Dirigirse a Nuevo Contrato.
4. Ingresar los datos correctos de tipo json, pero con un ID de colaborador que no existe.
5. Guardar.
6. Validación del sistema.
### **Datos de Entrada**
```json
[
    'contract_type' => 'Indefinido',
    'start_date' => '2024-01-01',
    'end_date' => null,
    'salary' => 3000000,
    'status' => 'Activo',
    'collaborator_id' => 9
]
```
### **Resultado Esperado**
___
Verificar que el sistema no permite crear un contrato para un colaborador inexistente.
### **Resultado Real**
___
### **Estado**
___
PASA


<hr style="border: 4px solid #000;">

# **Caso de Prueba#3**
### **ID del Caso de Prueba**
___
CP-CONTRATO-003
### **Título de la Prueba**
___
Creación de un Contrato con Fechas y Salario Inválidas
### **Módulo / Característica**
___
Contratos – Crear Contrato
### **Descripción**
___
Verificar que los campos de fecha y salario son validados correctamente.
### **Precondiciones**
___
1. Usuario autenticado.
2. Colaborador existente en la base de datos.
### **Pasos para la Ejecución**
___
1. Usuario Logueado.
2. Acceder al módulo contratos.
3. Dirigirse a Nuevo Contrato.
4. Ingresar los datos de tipo json con fechas en formato incorrecto y salario negativo.
5. Guardar.
6. Validación del sistema.
### **Datos de Entrada**
```json
[
    'contract_type' => 'Indefinido',
    'start_date' => '01-01-2024',
    'end_date' => null,
    'salary' => -500000,
    'status' => 'Activo',
    'collaborator_id' => 1
]
```
### **Resultado Esperado**
___
Verificar que el sistema no permite crear un contrato con fechas en formato incorrecto y salario negativo.
### **Resultado Real**
___
### **Estado**
___
PASA




<hr style="border: 4px solid #000;">

# **Caso de Prueba#4**
### **ID del Caso de Prueba**
___
CP-CONTRATO-004
### **Título de la Prueba**
___
Actualización de un Contrato Existente
### **Módulo / Característica**
___
Contratos – Actualizar Contrato
### **Descripción**
___
Verificar que se puede actualizar un contrato existente con datos válidos.
### **Precondiciones**
___
1. Usuario autenticado.
2. Contrato existente en la base de datos.
### **Pasos para la Ejecución**
___
1. Usuario Logueado.
2. Acceder al módulo contratos.
3. Seleccionar un contrato existente para actualizar.
4. Ingresar los datos correctos de tipo json para actualizar el contrato.
5. Guardar.
6. Validación del sistema.
### **Datos de Entrada**
```json
[
    'contract_type' => 'Fijo',
    'start_date' => '2024-01-01',
    'end_date' => '2024-12-31',
    'salary' => 3500000,
    'status' => 'Activo',
    'collaborator_id' => 1
]
```
### **Resultado Esperado**
___
Verificar que el contrato se actualiza correctamente en la base de datos.
### **Resultado Real**
___
### **Estado**
___
PASA