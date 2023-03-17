package main

import "github.com/gofiber/fiber/v2"

func main() {
    app := fiber.New()

    app.Get("/", func(c *fiber.Ctx) error {
        return c.JSON(fiber.Map{
            "success": "ok",
        })
    })

    app.Get("/users", func(c *fiber.Ctx) error {
        return c.SendString("todo:users")
    })

    app.Get("/users/:user", func(c *fiber.Ctx) error {
        return c.SendString("todo:users.user")
    })

    app.Get("/projects", func(c *fiber.Ctx) error {
        return c.SendString("todo:projects")
    })

    app.Get("/projects/:project", func(c *fiber.Ctx) error {
        return c.SendString("todo:projects.project")
    })

    app.Get("/projects/:project/tasks", func(c *fiber.Ctx) error {
        return c.SendString("todo:projects.project.tasks")
    })

    app.Patch("/tasks/:task", func(c *fiber.Ctx) error {
        return c.SendString("todo:tasks.task")
    })

    app.Listen(":3000")
}

