const schema = {
    type: "object",
    properties: {
        finance: {type: "object"},
        investment: {type: "object"}
    },
    required: ["finance", "investment"],
}

const data = {
    "finance": {
        "title": "Финансовые <span class=\"d-none d-md-inline\">услуги<\/span>",
        "items": [
            {
                "title": "Векселя",
                "text": "Доходный и надёжный инструмент инвестирования временно свободных денежных средств. Предлагаем дисконтные, простые процентные и беспроцентные векселя",
                "image": "\/frontend\/dist\/img\/pb-images\/pb-finance-cards\/veksel.png"
            },
            {
                "title": "Перевозка ценностей",
                "text": "Мы располагаем надёжным специализированным транспортом и опытными специалистами: инкассаторами, охраной и кассирами.",
                "image": "\/frontend\/dist\/img\/pb-images\/pb-finance-cards\/logistic.png"
            },
            {
                "title": "Индивидуальные ячейки",
                "text": "Мы располагаем надёжным специализированным транспортом и опытными специалистами: инкассаторами, охраной и кассирами.",
                "image": "\/frontend\/dist\/img\/pb-images\/pb-finance-cards\/individualСells.png"
            },
            {
                "title": "Текущие счета в пяти валютах",
                "text": "Мы располагаем надёжным специализированным транспортом и опытными специалистами: инкассаторами, охраной и кассирами.",
                "image": "\/frontend\/dist\/img\/pb-images\/pb-finance-cards\/currentAccount.png"
            },
            {
                "title": "Конверсионные операции по лучшему курсу",
                "text": "Мы располагаем надёжным специализированным транспортом и опытными специалистами: инкассаторами, охраной и кассирами.",
                "image": "\/frontend\/dist\/img\/pb-images\/pb-finance-cards\/conversionOperations.png"
            }
        ]
    },
    "investment": {
        "title": "Инвестиционные <span class=\"d-none d-md-inline\">услуги<\/span>",
        "items": [
            {
                "title": "Брокерское обслуживание",
                "text": "Совершение сделок с обеспечением рыночных цен и услуг для достижения ваших целей.",
                "image": "\/frontend\/dist\/img\/pb-images\/pb-investment-cards\/pb-investment-broker.png"
            },
            {
                "title": "Доверительное управление",
                "text": "Профессиональное управление инвестиционным портфелем для максимальной выгоды.",
                "image": "\/frontend\/dist\/img\/pb-images\/pb-investment-cards\/pb-investment-management.png"
            },
            {
                "title": "Депозитарное обслуживание",
                "text": "Сопровождение сделок и консультации по вопросам управления активами.",
                "image": "\/frontend\/dist\/img\/pb-images\/pb-investment-cards\/pb-investment-deposit.png"
            },
            {
                "title": "Инвестиционное консультирование",
                "text": "Персонализированный подход к подбору стратегий и инструментов инвестирования.",
                "image": "\/frontend\/dist\/img\/pb-images\/pb-investment-cards\/pb-investment-consulting.png"
            }
        ]
    }
}

const ajv = new window.ajv7();
const validate = ajv.compile(schema)
const valid = validate(data)
if (!valid) {
    console.log(validate.errors)
}
console.log({valid})
