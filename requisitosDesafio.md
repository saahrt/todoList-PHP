💼 Desafio: Aplicação ToDo com Bootstrap, CodeIgniter e MySQL

🎯 Objetivo:
Criar um sistema web simples de gerenciamento de tarefas (ToDo List), onde o usuário possa:
- Adicionar tarefas

- Listar tarefas

- Editar tarefas

- Excluir tarefas

🧱 Tecnologias obrigatórias
Frontend: HTML5, Bootstrap 4 ou 5

Backend: PHP com CodeIgniter (3 ou 4)

Banco de dados: MySQL

🧩 Requisitos do sistema
Tela Inicial (Home)

Lista todas as tarefas em um card/box.

Cada tarefa deve mostrar:

Título

Descrição

Status (Pendente ou Concluída)

Botões: Editar / Excluir

- Cadastrar tarefa

Formulário com campos:

Título (obrigatório)

Descrição (opcional)

- Editar tarefa

Mesmo formulário do cadastro, mas com os dados preenchidos.

- Excluir tarefa

Confirmação antes de deletar.

- Layout Responsivo

Usar Bootstrap para garantir responsividade e visual agradável.

🗄️ Estrutura sugerida da tabela tasks:

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    is_completed TINYINT(1) DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

📦 Bônus (não obrigatório)

- Implementar filtro de tarefas (Exibir: Todas / Pendentes / Concluídas)

- Feedback visual com Toasts ou Alertas Bootstrap

📁 Entrega esperada
Código-fonte completo em um repositório Git ou ZIP.

Dump do banco de dados (.sql).

Instruções simples de como rodar o projeto (README.md).
