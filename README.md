**PROJETO HOSPITAL UNASP**

Vinicius Mariano Afonso
Igor Marinho Ferreira
Bruno Dobelin Guimarães
Aline de Oliveira Lima

**RESUMO**
Nosso projeto de modelagem de banco de dados para um hospital inclui diversoscomponentes essenciais que visam otimizar a coleta, organização e análise de dados relevantes.


**Palavras-chave**
Agendamento de consultas. Cirurgia. Pacientes. Gerenciamento de recursos humanos. Equipe médica.

1. **INTRODUÇÃO**
A implementação de um sistema de hospital é motivada por diversos objetivos e necessidades, como a melhoria da eficiência, registro e acesso a dados, tomada de decisões clínicas informadas, segurança do paciente, agendamento e gerenciamento de recursos, aprimoramento da comunicação entre equipes médicas, conformidade com regulamentações, economia de custos a longo prazo e aprimoramento da experiência do paciente. Esses objetivos visam criar um ambiente hospitalar mais eficaz, seguro e eficiente.

2. **Estudo de Caso**
Dudu Entreprise necessitava de um sistema para gerenciar suas clínicas de atendimento que começaram a crescer em um nível exponencial, com essa necessidade foi nos solicitado um sistema para gerenciar toda a franquia que embora fossem poucas começara a crescer para uma empresa de médio porte.

3. **Análise de Requisitos**
- Objetivo: O card de Análise de Dados tem como objetivo extrair informações valiosas dos dados armazenados, identificar tendências e melhorar os processos hospitalares.
- Requisitos: 
  - Deve permitir a criação de consultas e relatórios personalizados para análise de dados.
  - Deve fornecer ferramentas de visualização de dados, como gráficos e tabelas.
  - Deve garantir a segurança dos dados, com acesso restrito apenas a pessoal autorizado.
  - Deve ser capaz de identificar tendências, como picos de atendimento ou variações nos tratamentos.
- Cadastro de Profissionais:
- Objetivo: O card de Cadastro de Profissionais visa o gerenciamento adequado dos profissionais de saúde, suas especialidades, históricos de atendimento e agendamentos de consultas, garantindo uma gestão eficiente e personalizada dos cuidados prestados aos pacientes.
- Requisitos:
  - Deve permitir o registro de informações detalhadas de médicos, enfermeiros e outros profissionais de saúde.
  - Deve possibilitar o registro de suas especialidades e históricos de atendimento.
  - Deve permitir o agendamento de consultas para pacientes.
  - Deve garantir a disponibilidade e escalonamento de profissionais com base na demanda.
- Cadastro de Ambiente:
- Objetivo: O card de Cadastro de Ambiente visa registrar salas e departamentos do hospital para melhor organização, alocação de recursos físicos e controle dos ambientes disponíveis para atendimento médico, procedimentos e internações.
- Requisitos:
  - Deve permitir o registro de informações detalhadas de ambientes, incluindo capacidade, equipamentos e especializações.
  - Deve permitir o agendamento e alocação de ambientes para procedimentos e consultas.
  - Deve permitir o monitoramento da disponibilidade de ambientes em tempo real.
  - Deve garantir a segurança e conformidade com regulamentações de saúde para cada ambiente.

**CONCLUSÃO**
O projeto de desenvolvimento de um sistema de gerenciamento para as clínicas da Dudu Entreprise é uma iniciativa crucial para acompanhar o crescimento exponencial da empresa e garantir uma gestão eficiente de suas operações. Com base nos requisitos delineados, destacamos os seguintes pontos-chave:

Análise de Dados: O sistema proposto permite a extração de informações valiosas dos dados armazenados, identificando tendências e melhorando os processos hospitalares. Isso é fundamental para a tomada de decisões informadas e melhoria contínua da qualidade do atendimento.

Cadastro de Profissionais: O módulo de cadastro de profissionais garantirá um gerenciamento eficaz dos recursos humanos, incluindo médicos, enfermeiros e outros profissionais de saúde. A capacidade de registrar informações detalhadas, especialidades e históricos de atendimento, juntamente com o agendamento de consultas, permitirá uma abordagem personalizada no cuidado prestado aos pacientes.

Cadastro de Ambiente: O sistema de cadastro de ambientes possibilitará o controle e alocação eficiente dos recursos físicos do hospital, incluindo salas e departamentos. Isso é crucial para otimizar a capacidade de atendimento, garantir a disponibilidade de ambientes em tempo real e manter a conformidade com regulamentações de saúde.

Além disso, a segurança dos dados e o acesso restrito apenas a pessoal autorizado são considerações fundamentais em todos os aspectos do sistema, garantindo a confidencialidade e integridade das informações dos pacientes.

Em resumo, o sistema proposto desempenhará um papel essencial na transformação da Dudu Entreprise em uma empresa de médio porte bem-sucedida. Ele fornecerá as ferramentas necessárias para uma gestão eficaz das clínicas, permitindo análises avançadas de dados, garantindo o agendamento e monitoramento adequados de profissionais e ambientes, tudo isso com a máxima segurança e conformidade. Isso resultará em uma melhoria significativa na qualidade do atendimento e na satisfação dos pacientes, além de apoiar o crescimento contínuo da empresa.

MODO DE USO
Localmente
   1.	Na pasta do projeto baixe e instale o composer no terminal utilize o composer install, e a configuração do SMTP é necessária para a utilização do Sistema.
Online
   1.	Abra o link UNASP - Portal administrativo, e utilize o usuário de teste:
      a.	User: admin
      b.	Pass: Admin@123
   2.	Com esse usuário, poderá ser criado o acesso para os outros painéis 
      a.	http://89.116.214.168/projects/hospital-deve/authentication/medical
      b.	http://89.116.214.168/projects/hospital-deve/authentication/patient
   •	Sempre fazer logout para acessar outro painel, também não esquecer de que não será possivel trocar a senha do admin.
   •	Foi desabilitado o esquecer senha do medical e patient.
