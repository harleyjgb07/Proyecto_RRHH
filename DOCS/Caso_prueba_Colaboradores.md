# **Casos de Prueba -Colaboradores**
Estos casos de prueba describen paso a paso lo que los test deben realizar 


<hr style="border: 4px solid #000;">

## **Caso de Prueba#1**
### **ID del Caso de Prueba**
___
CP-COLAB-001
### **Título de la Prueba**
___
Creación de un Colaborador Exitoso
### **Módulo / Característica**
___
Colaboradores – Crear Colaborador
### **Descripción**
___
Verifica que un colaborador se crea correctamente
### **Precondiciones**
___
1.	Usuario autenticado.  
2.	Que el colaborador sea mayor de edad.
### **Pasos para la Ejecución**
___
1. Usuario Logueado.
2. Acceder al módulo colaborador.
3. dirigirse a Nuevo colaborador.
4. Ingresar los datos correctos de tipo json.
5. Guardar.
6. Validación del sistema.
### **Datos de Entrada**
```json
[
    'first_name' => 'Harley',
    'last_name' => 'Guerra',
    'document_type' => 'CC',
    'document_number' => '1122397884',
    'birth_date' => '09.12.2004',
    'email' => 'guerraharley90@gmail.com',
    'phone_number' => '3202536746',
    'adress' => 'cll 10sur#24-34',
]
```

### **Resultado Esperado**
___
Verificar que el colaborador se crea correctamente en la base de datos
### **Resultado Real**
___

### **Estado**
___
Pasa



<hr style="border: 4px solid #000;">

## **Caso de Prueba#2**

### **ID del Caso de Prueba**
___
CP-COLAB-002
### **Título de la Prueba**
___
Creación de un Colaborador Fallido
### **Módulo / Característica**
___
Colaboradores – Crear Colaborador
### **Descripción**
___
Verifica que un colaborador se crea incorrectamente
### **Precondiciones**
___
1.	Usuario autenticado.  
2.	Un colaborador ya creado en la base de datos.

### **Pasos para la Ejecución**
___
1. Usuario Logueado.
2. Acceder al módulo colaborador.
3. dirigirse a Nuevo colaborador.
4. Ingresar los datos correctos de tipo json.
5. Guardar.
6. Validación del sistema.

### **Datos de Entrada**
```json
[
    'first_name' => 'Luis',
    'last_name' => 'Guerra',
    'document_type' => 'CC',
    'document_number' => '1122397884',
    'birth_date' => '23.04.2006',
    'email' => 'guerraharley90@gmail.com',
    'phone_number' => '3232456754',
    'adress' => 'cll 12#34-23,
];

```

### **Resultado Esperado**
___
Verificar que no se crea un colaborador con datos duplicados
### **Resultado Real**
___

### **Estado**
___
Pasa



<hr style="border: 4px solid #000;">

## **Caso de Prueba#3**

### **ID del Caso de Prueba**
___
CP-COLAB-003
### **Título de la Prueba**
___
Actualización de un Colaborador Exitoso
### **Módulo / Característica**
___
Colaboradores – Actualizar Colaborador
### **Descripción**
___
Verifica que un colaborador se crea correctamente
### **Precondiciones**
___
1.	Usuario autenticado.  
2.	Un colaborador ya creado en la base de datos.

### **Pasos para la Ejecución**
___
1. Usuario Logueado.
2. Acceder al módulo colaborador.
3. dirigirse a Nuevo colaborador.
4. Ingresar los datos correctos de tipo json.
5. Guardar.
6. Validación del sistema.

### **Datos de Entrada**
```json
[
    'first_name' => 'Luis',
    'last_name' => 'Guerra',
    'document_type' => 'CC',
    'document_number' => '1122397884',
    'birth_date' => '23.04.2006',
    'email' => 'guerraharley90@gmail.com',
    'phone_number' => '3232456754',
    'adress' => 'cll 12#34-23,
];

```

### **Resultado Esperado**
___
Verificar que no se crea un colaborador con datos duplicados
### **Resultado Real**
___

### **Estado**
___
Pasa




<hr style="border: 4px solid #000;">

## **Caso de Prueba#4**

### **ID del Caso de Prueba**
___
CP-COLAB-004
### **Título de la Prueba**
___
Obtener lista de Colaboradores
### **Módulo / Característica**
___
Colaboradores – Obtener lista de Colaboradores
### **Descripción**
___
Verifica que se obtiene la lista de colaboradores correctamente
### **Precondiciones**
___
1.	Usuario autenticado.
2.	Al menos un colaborador creado en la base de datos.
### **Pasos para la Ejecución**
___
1. Usuario Logueado.
2. Acceder al módulo colaborador.
3. dirigirse a lista de colaboradores.
4. Validación del sistema.
### **Datos de Entrada**
___
N/A
### **Resultado Esperado**
___
Verificar que se obtiene la lista de colaboradores correctamente
### **Resultado Real**
___

### **Estado**
___
Pasa




<hr style="border: 4px solid #000;">

## **Caso de Prueba#5**

### **ID del Caso de Prueba**
___
CP-COLAB-005
### **Título de la Prueba**
___
Eliminar un Colaborador Exitosamente
### **Módulo / Característica**
___
Colaboradores – Eliminar Colaborador
### **Descripción**
___
Verifica que un colaborador se elimina correctamente
### **Precondiciones**
___
1.	Usuario autenticado.
2.	Un colaborador ya creado en la base de datos.
### **Pasos para la Ejecución**
___
1. Usuario Logueado.
2. Acceder al módulo colaborador.
3. dirigirse a lista de colaboradores.
4. Seleccionar un colaborador.
5. Eliminar el colaborador.
6. Validación del sistema.
### **Datos de Entrada**
___
N/A
### **Resultado Esperado**
___
Verificar que el colaborador se elimina correctamente de la base de datos
### **Resultado Real**
___
### **Estado**
___
Pasa