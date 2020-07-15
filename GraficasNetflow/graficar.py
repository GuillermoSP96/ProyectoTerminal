import plotly
import json
with open('data.json') as file:
    data = json.load(file)
    for client in data['clients']:
        print('giraffes:', client['giraffes'])
        print('orangutans:', client['orangutans'])
        print('monkeys:', client['monkeys'])
        print('')
# create a simple plot
bar = plotly.graph_objs.Bar(x=['giraffes', 'orangutans', 'monkeys'],
                            y=[client['giraffes'], client['orangutans'],client['monkeys']])
layout = plotly.graph_objs.Layout()
fig = plotly.graph_objs.Figure([bar], layout)

# convert it to JSON
fig_json = fig.to_json()

# a simple HTML template
template = """<html>
<head>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body>
    <div id='divPlotly'></div>
    <script>
        var plotly_data = {}
        Plotly.react('divPlotly', plotly_data.data, plotly_data.layout);
    </script>
</body>

</html>"""

# write the JSON to the HTML template
with open('index.html', 'w') as f:
    f.write(template.format(fig_json))
