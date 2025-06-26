# LSC_Website

Este repositório contém personalizações e arquivos de apoio utilizados no site do Laboratório de Sistemas de Computação (LSC) da UNICAMP. Ele se baseia no tema **Kadence** do WordPress e disponibiliza templates dinâmicos, funções auxiliares e recursos em JavaScript/CSS.

## Estrutura

- **functions.php, header.php, footer.php** – Arquivos do tema com funções adicionais para o WordPress.
- **listagem/** – Contém templates PHP que geram páginas dinâmicas para exibição de membros do laboratório, alunos e outros dados lidos de arquivos TSV.
- **personalizado/** – Scripts JavaScript e estilos CSS específicos do site.
- **tests/** – Testes simples escritos em PHP.

## Rodando os testes

Os testes ficam no diretório `tests`. Para executá‑los é necessário ter o PHP instalado:

```bash
php tests/TransfAssocArrayTest.php
```

O script executa um teste básico da função `transf_assoc_array` e imprime **"Test passed"** quando o resultado é o esperado.
