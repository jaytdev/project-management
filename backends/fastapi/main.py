from fastapi import FastAPI

app = FastAPI()

@app.get("/")
def index():
    return {"status": "ok"}


@app.get("/users")
def users():
    return "todo:users"


@app.get("/users/{user}")
def user():
    return "todo:users.user"


@app.get("/projects")
def projects():
    return "todo:projects"


@app.get("/projects/{project}")
def project():
    return "todo.project"


@app.get("/projects/{project}/tasks")
def project_tasks():
    return "todo.project.tasks"


@app.post("/projects/{project}/tasks")
def post_project_task():
    return "todo:project.post.task"

