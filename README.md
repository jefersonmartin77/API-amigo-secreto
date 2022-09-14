# Faculdade
## Instalação 
```bash
cd  myapp 
php composer install
```
### Configure .env
```env
DATABASE_URL="sqlite:///%kernel.project_dir%/var/app.db"

###< symfony/mailer ###
MAILER_DSN=smtp://email@exemplo:****@smtp.exemplo.com.br:587

```


## create user
```rest
post http://localhost:8000/api/add-user
{
        "nome":"{{$randomFullName}}",
    "userName":"{{$randomUserName}}"
}
```

## create Item Lista de desejo

```rest
post http://localhost:8000/api/lista-desejo/create/{userId}

{
        "nome":"{{$randomProductName}}",
    "descricao":"{{$randomStreetAddress}}"
}
```

## listar Itens Lista de desejo
```rest
get http://localhost:8000/api/lista-desejo/list
```

## delete Item Liste de desejo
```rest
delete http://localhost:8000/api/lista-desejo/delete/{itemID}
```
