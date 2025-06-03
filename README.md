# 📝 Desafio ToDo List - Gerenciamento de Tarefas

## 💼 Descrição do Desafio

Desenvolver uma aplicação web de gerenciamento de tarefas (ToDo List) utilizando PHP, MySQL e Bootstrap. O sistema permite ao usuário adicionar, listar, editar, excluir e filtrar tarefas.

---
## Pontos a melhorar

Neste projeto, optei por implementar toda a lógica e interface em um único arquivo PHP para simplificar o desenvolvimento, dada a simplicidade da aplicação e o prazo. Reconheço que, para projetos mais robustos e escaláveis, a separação em múltiplos arquivos seguindo o padrão MVC e o uso de frameworks são essenciais para melhor organização, manutenção e reaproveitamento de código. Estou ciente dessas boas práticas e pretendo aplicá-las em projetos futuros

## 🎯 Funcionalidades Implementadas

- ✅ Adicionar tarefas (com título obrigatório e descrição opcional)
- ✅ Listar todas as tarefas
- ✅ Editar tarefas (com formulário pré-preenchido)
- ✅ Excluir tarefas (com confirmação)
- ✅ Status da tarefa (Pendente ou Concluída)
- ✅ Marcar tarefas como concluídas
- ✅ Filtro de tarefas por status (Todas, Pendentes, Concluídas)
- ✅ Layout responsivo básico (uso simples de Bootstrap)
- ✅ Banco de dados MySQL funcional

---

## ❌ Funcionalidades Não Implementadas

- 🚧 Uso do framework CodeIgniter (MVC não aplicado)
- 🚧 Integração completa com Bootstrap para layout refinado e responsivo
- 🚧 Feedback visual (Toasts ou Alerts do Bootstrap)

---

## 🚀 Tecnologias Utilizadas

- ✅ **Frontend:** HTML5, CSS3
- ✅ **Backend:** PHP Procedural
- ✅ **Banco de Dados:** MySQL

---

## 🗂️ Estrutura do Banco de Dados

```sql
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    is_completed TINYINT(1) DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
