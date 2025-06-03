## 🚀 Como rodar o projeto

### Pré-requisitos

- Ter um servidor local com PHP e MySQL instalado. (Ex.: XAMPP, WAMP, Laragon, MAMP)

### Passo a passo

1. Clone ou baixe o projeto e coloque a pasta na área pública do servidor local.  
   - Exemplo no XAMPP: coloque dentro da pasta `htdocs`.

2. Inicie os serviços Apache e MySQL no seu servidor local.

3. Crie o banco de dados:
   - Acesse o `phpMyAdmin`.
   - Crie um banco de dados chamado `todo_db`.
   - Importe o arquivo `todo_db.sql` que está na raiz do projeto para criar as tabelas.

4. Verifique as configurações de conexão no arquivo `index.php`:
   - Por padrão, está assim:
   ```php
   $connection = new mysqli("localhost", "root", "", "todo_db");
Caso seu MySQL tenha senha, adicione-a no terceiro parâmetro.

5. No navegador, acesse o projeto: http://localhost/nome-da-pasta

✔️ Prontinho! O projeto estará rodando localmente no seu compuatdor agora :)
