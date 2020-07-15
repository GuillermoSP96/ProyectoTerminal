import json
data = {}
data['clients'] = []
data['clients'].append({
    'giraffes': 23,
    'orangutans':24,
    'monkeys': 29
    })
with open('data.json', 'w') as file:
    json.dump(data, file, indent=4)
