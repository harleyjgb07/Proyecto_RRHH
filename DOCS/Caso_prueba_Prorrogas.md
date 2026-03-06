# **Casos de Prueba - Porroga**
Estos casos de prueba describen paso a paso lo que los test deben realizar

<hr style="border: 4px solid #000;">

## **Caso de Prueba#1**
### **ID del Caso de Prueba**
___
CP-PORROGA-001
### **Título de la Prueba**
___
Creación de una Prórroga Exitosa
### **Módulo / Característica**
___
Prórrogas – Crear Prórroga
### **Descripción**
___
Verificar que se puede añadir una prórroga (en tiempo, en valor o en ambos) a un contrato de tipo "Fijo" o "Prestación de Servicios".
### **Precondiciones**
___
1. Usuario autenticado.
2. Contrato existente de tipo "Fijo" o "Prestación de Servicios".
### **Pasos para la Ejecución**
___
1. Usuario Logueado.
2. Acceder al módulo prórrogas.
3. Dirigirse a Nueva Prórroga.
4. Ingresar los datos correctos de tipo json, incluyendo el ID del contrato existente.
5. Guardar.
6. Validación del sistema.
### **Datos de Entrada**
```json
[
    'extension_type' => 'Ambos',
    'extension_value' => '3 meses',
    'salary_increase' => 500000,
    'contract_id' => 1
]
```
### **Resultado Esperado**
___
Verificar que la prórroga se crea correctamente en la base de datos y está asociada al contrato.
### **Resultado Real**
___
### **Estado**
___
PASA


<hr style="border: 4px solid #000;">

## **Caso de Prueba#2**
### **ID del Caso de Prueba**
___
CP-PORROGA-002
### **Título de la Prueba**
___
Actualización de la Fecha de Finalización del Contrato con Prórroga
### **Módulo / Característica**
___
Prórrogas – Crear Prórroga
### **Descripción**
___
Verificar que la fecha de finalización del contrato se actualiza correctamente al añadir una prórroga de tiempo.
### **Precondiciones**
___
1. Usuario autenticado.
2. Contrato existente de tipo "Fijo" o "Prestación de Servicios" con una fecha de finalización definida.
### **Pasos para la Ejecución**
___
1. Usuario Logueado.
2. Acceder al módulo prórrogas.
3. Dirigirse a Nueva Prórroga.
4. Ingresar los datos correctos de tipo json, incluyendo el ID del contrato existente.
5. Guardar.
6. Validación del sistema.
### **Datos de Entrada**
```json
[
    'extension_type' => 'Tiempo',
    'extension_value' => '3 meses',
    'contract_id' => 1
]
```
### **Resultado Esperado**
___
Verificar que la fecha de finalización del contrato se actualiza correctamente al añadir la prórroga.
### **Resultado Real**
___
### **Estado**
___
PASA



<hr style="border: 4px solid #000;">

## **Caso de Prueba#3**
### **ID del Caso de Prueba**
___
CP-PORROGA-003
### **Título de la Prueba**
___
Creación de una Prórroga para un Contrato No Elegible
### **Módulo / Característica**
___
Prórrogas – Crear Prórroga
### **Descripción**
___
Verificar que el sistema rechaza una prórroga para un contrato con estado "Terminado" o "Finalizado".
### **Precondiciones**
___
1. Usuario autenticado.
2. Contrato existente con estado "Terminado" o "Finalizado".
### **Pasos para la Ejecución**
___
1. Usuario Logueado.
2. Acceder al módulo prórrogas.
3. Dirigirse a Nueva Prórroga.
4. Ingresar los datos correctos de tipo json, incluyendo el ID del contrato finalizado.
5. Guardar.
6. Validación del sistema.
### **Datos de Entrada**
```json
[
    'extension_type' => 'Tiempo',
    'extension_value' => '3 meses',
    'contract_id' => 2
]
```
### **Resultado Esperado**
___
Verificar que el sistema muestra un mensaje de error indicando que no se puede añadir una prórroga a un contrato finalizado.
### **Resultado Real**
___
### **Estado**
___
PASA
