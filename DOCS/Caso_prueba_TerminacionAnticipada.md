# **Casos de Prueba - Terminación Contrato Anticipado**
Estos casos de prueba describen paso a paso lo que los test deben realizar

<hr style="border: 4px solid #000;">

## **Caso de Prueba#1**
### **ID del Caso de Prueba**
___
CP-TERMINACION-001
### **Título de la Prueba**
___
Terminación Anticipada Exitosa
### **Módulo / Característica**
___
Terminación Contrato Anticipado – Crear Terminación Anticipada
### **Descripción**
___
Verificar que se puede cambiar el estado de un contrato a "Terminado".
### **Precondiciones**
___
1. Usuario autenticado.
2. Contrato existente con estado "Activo".
### **Pasos para la Ejecución**
___
1. Usuario Logueado.
2. Acceder al módulo de terminación de contrato anticipado.
3. Dirigirse a Nueva Terminación Anticipada.
4. Ingresar los datos correctos de tipo json, incluyendo el ID del contrato existente.
5. Guardar.
6. Validación del sistema.
### **Datos de Entrada**
```json
[
    'termination_reason' => 'Mutuo Acuerdo',
    'termination_date' => '2024-06-30',
    'contract_id' => 1
]
```
### **Resultado Esperado**
___
Verificar que el contrato se actualiza correctamente a estado "Terminado" en la base de datos.
### **Resultado Real**
___
### **Estado**
___
PASA


<hr style="border: 4px solid #000;">

## **Caso de Prueba#2**
### **ID del Caso de Prueba**
___
CP-TERMINACION-002
### **Título de la Prueba**
___
Terminación Anticipada con Datos Validos
### **Módulo / Característica**
___
Terminación Contrato Anticipado – Crear Terminación Anticipada
### **Descripción**
___
Verificar que se registra correctamente la fecha y el motivo de la terminación.
### **Precondiciones**
___
1. Usuario autenticado.
2. Contrato existente con estado "Activo".
### **Pasos para la Ejecución** 
___
1. Usuario Logueado.
2. Acceder al módulo de terminación de contrato anticipado.
3. Dirigirse a Nueva Terminación Anticipada.
4. Ingresar los datos correctos de tipo json, incluyendo el ID del contrato existente.
5. Guardar.
6. Validación del sistema.
### **Datos de Entrada**
```json
[
    'termination_reason' => 'Renuncia Voluntaria',
    'termination_date' => '2024-07-15',
    'contract_id' => 2
]
```
### **Resultado Esperado**
___
Verificar que la fecha y el motivo de la terminación se guardan correctamente en la base de datos.
### **Resultado Real**
___
### **Estado**
___
PASA


<hr style="border: 4px solid #000;">

## **Caso de Prueba#3**
### **ID del Caso de Prueba**
___
CP-TERMINACION-003
### **Título de la Prueba**
___
Terminación Anticipada para Contrato No Elegible
### **Módulo / Característica**
___
Terminación Contrato Anticipado – Crear Terminación Anticipada
### **Descripción**
___
Verificar que el sistema rechaza la terminación anticipada para un contrato que ya está "Terminado" o "Finalizado".
### **Precondiciones**
___
1. Usuario autenticado.
2. Contrato existente con estado "Terminado" o "Finalizado".
### **Pasos para la Ejecución**
___
1. Usuario Logueado.
2. Acceder al módulo de terminación de contrato anticipado.
3. Dirigirse a Nueva Terminación Anticipada.
4. Ingresar los datos correctos de tipo json, incluyendo el ID del contrato no elegible.
5. Guardar.
6. Validación del sistema.
### **Datos de Entrada**
```json
[
    'termination_reason' => 'Despido Justificado',
    'termination_date' => '2024-08-01',
    'contract_id' => 3
]
```
### **Resultado Esperado**
___
Verificar que el sistema muestra un mensaje de error indicando que el contrato no es elegible para terminación anticipada.
### **Resultado Real**
___
### **Estado**
___

