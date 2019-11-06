# FiscallWEB

  Este é o Fiscall, uma das três partes de um sistema de monitoramento de linhas viarias da EMTU da grande São Paulo

## Comandos (Container)

  Para iniciar execute os seguintes comandos (como root):

```
    # docker-compose build
```

e

```
    # docker-compose up
```

(ou)

```
    # docker-compose up -d
```

para iniciar em segundo plano.

## Acesso

Para subir o banco, acesse o phpmyadmin em localhost:8000 com utilizando "root" para login e senha, e importe o arquivo www/2753888_bdfiscall.sql

A aplicação estará disponivel em localhost:8001
