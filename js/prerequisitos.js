window.addEventListener('load', d3.json.bind(this, 'api/getAllCourses.php', drawGraph));

function drawGraph(error, data) {

  var nested_data = d3.nest()
    .key(function(d) { return d.perfil; })
    .entries(data);

  var perfilColumnWidth = 140;
  var courseLineHeight = 70;

  var maxCoursesPerPerfil = 0;
  for (var i = 0; i < nested_data.length; i++) {
    maxCoursesPerPerfil = Math.max(maxCoursesPerPerfil, nested_data[i].values.length);
  }

  var graphWidth = nested_data.length * perfilColumnWidth + 20;
  var graphHeigth = maxCoursesPerPerfil * courseLineHeight + 80;

  var graphLinks = d3
    .select('.graph')
    .append('svg')
    .attr('width', graphWidth)
    .attr('height', graphHeigth)
    .attr('class', 'graphLinks');

  var graph = d3
    .select('.graph')
    .append('svg')
    .attr('width', graphWidth)
    .attr('height', graphHeigth)
    .attr('class', 'graphCourses');

  var perfis = graph
    .selectAll('g')
    .data(nested_data)
    .enter()
    .append('g')
    .attr('transform', function (d, i) { return 'translate(' + (i * perfilColumnWidth + 20) + ', 0)'; });

  var perfisRect = perfis
    .append('rect')
    .attr('x', 0)
    .attr('y', 20)
    .attr('width', 120)
    .attr('height', 50)
    .attr('class', 'perfil');

  var perfisText = perfis
    .append('text')
    .text(function(d) { return 'Perfil ' + d.key; })
    .attr('x', 60)
    .attr('y', 45)
    .attr('class', 'perfil-text');

  var courses = perfis
    .selectAll('g')
    .data(function(d) { return d.values; })
    .enter()
    .append('g')
    .attr('transform', function (d, i) { return 'translate(0, ' + (i * courseLineHeight + 80) + ')'; })
    .attr('data-course', function (d) { return d.cpd; })
    .attr('class', 'course')
    .on('click', function (d) {
      if (!this.classList.contains('selected')) {
        linkHighlightOn(graph, graphLinks, d.cod);
      } else {
        linkHighlightOff(graph, graphLinks, d.cod);
      }
    });

  var coursesRect = courses
    .append('rect')
    .attr('x', 0)
    .attr('y', 0)
    .attr('width', 120)
    .attr('height', 40);

  var coursestext = courses
    .append('text')
    .text(function(d) { return d.codDisciplina; })
    .attr('x', 60)
    .attr('y', 25);

  d3.json('api/getAllPrerequisites.php', drawLinks.bind(this, graph, graphLinks));
}

function getElementPosition(graph, elem) {
  var g = graph[0][0];
  var e = elem[0][0];
  var brect = g.getBoundingClientRect();
  var erect = e.getBoundingClientRect();
  var position = {
    x: erect.left - brect.left,
    y: erect.top - brect.top
  };

  return position;
}

function getCoursePosition(graph, elem) {
  var position = getElementPosition(graph, elem);
  position.x += 60;
  position.y += 20;

  return position;
}

function drawLinks(graph, graphLinks, error, link_data) {

  for (var i = 0; i < link_data.length; i++) {
    drawLink(link_data[i]);
  }

  function drawLink(link) {
    var source = graph
      .selectAll('.course')
      .filter(function () { return this.dataset['course'] == link.course; });

    var target = graph
      .selectAll('.course')
      .filter(function () { return this.dataset['course'] == link.pre; });

    graphLinks
      .append('path')
      .attr('class', 'link')
      .attr('data-course', link.course)
      .attr('data-pre', link.pre)
      .attr('d', d3.svg.diagonal()
        .source(function() { return getCoursePosition(graph, source); })
        .target(function() { return getCoursePosition(graph, target); })
      );
  }
}

function linkHighlightOn(graph, graphLinks, courseId) {
  graph
    .selectAll('.course')
    .filter(function () { return this.dataset['course'] == courseId; })
    .each(function () {
      this.classList.add('selected');
    });

  graphLinks
    .selectAll('.link')
    .filter(function () { return this.dataset['course'] == courseId; })
    .each(function () {
      this.classList.add('selected');
      linkHighlightOn(graph, graphLinks, this.dataset['pre']);
    });
}

function linkHighlightOff(graph, graphLinks, courseId) {
  graph
    .selectAll('.course')
    .filter(function () { return this.dataset['course'] == courseId; })
    .each(function () {
      if (!this.classList.contains('selected')) {
        return;
      }

      this.classList.remove('selected');

      graphLinks
        .selectAll('.link')
        .filter(function () { return this.dataset['course'] == courseId; })
        .each(function () {
          this.classList.remove('selected');
          linkHighlightOff(graph, graphLinks, this.dataset['pre']);
        });

      graphLinks
        .selectAll('.link')
        .filter(function () { return this.dataset['pre'] == courseId; })
        .each(function () {
          this.classList.remove('selected');
          linkHighlightOff(graph, graphLinks, this.dataset['course']);
        });
    });
}