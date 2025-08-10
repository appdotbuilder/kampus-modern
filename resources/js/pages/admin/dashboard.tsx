import React from 'react';
import { Head, Link } from '@inertiajs/react';
import { AppShell } from '@/components/app-shell';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Button } from '@/components/ui/button';

export default function AdminDashboard() {
    return (
        <AppShell>
            <Head title="Admin Dashboard" />
            
            <div className="space-y-6">
                <div>
                    <h1 className="text-3xl font-bold text-gray-900">🎓 University Admin Dashboard</h1>
                    <p className="text-gray-600 mt-2">
                        Manage your university's academic data, content, and administrative functions
                    </p>
                </div>

                {/* Quick Stats */}
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <Card>
                        <CardHeader className="flex flex-row items-center justify-between space-y-0 pb-2">
                            <CardTitle className="text-sm font-medium">Total Students</CardTitle>
                            <span className="text-2xl">👨‍🎓</span>
                        </CardHeader>
                        <CardContent>
                            <div className="text-2xl font-bold">2,543</div>
                            <p className="text-xs text-muted-foreground">
                                +12% from last semester
                            </p>
                        </CardContent>
                    </Card>
                    
                    <Card>
                        <CardHeader className="flex flex-row items-center justify-between space-y-0 pb-2">
                            <CardTitle className="text-sm font-medium">Faculties</CardTitle>
                            <span className="text-2xl">🏛️</span>
                        </CardHeader>
                        <CardContent>
                            <div className="text-2xl font-bold">8</div>
                            <p className="text-xs text-muted-foreground">
                                Active faculties
                            </p>
                        </CardContent>
                    </Card>
                    
                    <Card>
                        <CardHeader className="flex flex-row items-center justify-between space-y-0 pb-2">
                            <CardTitle className="text-sm font-medium">Study Programs</CardTitle>
                            <span className="text-2xl">📚</span>
                        </CardHeader>
                        <CardContent>
                            <div className="text-2xl font-bold">24</div>
                            <p className="text-xs text-muted-foreground">
                                Across all levels
                            </p>
                        </CardContent>
                    </Card>
                    
                    <Card>
                        <CardHeader className="flex flex-row items-center justify-between space-y-0 pb-2">
                            <CardTitle className="text-sm font-medium">News Articles</CardTitle>
                            <span className="text-2xl">📰</span>
                        </CardHeader>
                        <CardContent>
                            <div className="text-2xl font-bold">156</div>
                            <p className="text-xs text-muted-foreground">
                                Published this year
                            </p>
                        </CardContent>
                    </Card>
                </div>

                {/* Quick Actions */}
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <Card className="hover:shadow-lg transition-shadow">
                        <CardHeader>
                            <CardTitle className="flex items-center gap-2">
                                <span className="text-2xl">🏛️</span>
                                Faculty Management
                            </CardTitle>
                            <CardDescription>
                                Manage university faculties and departments
                            </CardDescription>
                        </CardHeader>
                        <CardContent>
                            <div className="space-y-2">
                                <Link href="/admin/faculties">
                                    <Button className="w-full" variant="outline">
                                        View All Faculties
                                    </Button>
                                </Link>
                                <Link href="/admin/faculties/create">
                                    <Button className="w-full">
                                        Add New Faculty
                                    </Button>
                                </Link>
                            </div>
                        </CardContent>
                    </Card>

                    <Card className="hover:shadow-lg transition-shadow">
                        <CardHeader>
                            <CardTitle className="flex items-center gap-2">
                                <span className="text-2xl">👨‍🎓</span>
                                Student Management
                            </CardTitle>
                            <CardDescription>
                                Manage student records and enrollment
                            </CardDescription>
                        </CardHeader>
                        <CardContent>
                            <div className="space-y-2">
                                <Link href="/admin/students">
                                    <Button className="w-full" variant="outline">
                                        View All Students
                                    </Button>
                                </Link>
                                <Link href="/admin/students/create">
                                    <Button className="w-full">
                                        Add New Student
                                    </Button>
                                </Link>
                            </div>
                        </CardContent>
                    </Card>

                    <Card className="hover:shadow-lg transition-shadow">
                        <CardHeader>
                            <CardTitle className="flex items-center gap-2">
                                <span className="text-2xl">📰</span>
                                News Management
                            </CardTitle>
                            <CardDescription>
                                Create and manage university news articles
                            </CardDescription>
                        </CardHeader>
                        <CardContent>
                            <div className="space-y-2">
                                <Link href="/admin/news">
                                    <Button className="w-full" variant="outline">
                                        View All News
                                    </Button>
                                </Link>
                                <Link href="/admin/news/create">
                                    <Button className="w-full">
                                        Create News Article
                                    </Button>
                                </Link>
                            </div>
                        </CardContent>
                    </Card>

                    <Card className="hover:shadow-lg transition-shadow">
                        <CardHeader>
                            <CardTitle className="flex items-center gap-2">
                                <span className="text-2xl">👨‍🏫</span>
                                Lecturer Management
                            </CardTitle>
                            <CardDescription>
                                Manage faculty members and lecturers
                            </CardDescription>
                        </CardHeader>
                        <CardContent>
                            <div className="space-y-2">
                                <Button className="w-full" variant="outline" disabled>
                                    View All Lecturers
                                </Button>
                                <Button className="w-full" disabled>
                                    Add New Lecturer
                                </Button>
                            </div>
                            <p className="text-xs text-gray-500 mt-2">Coming Soon</p>
                        </CardContent>
                    </Card>

                    <Card className="hover:shadow-lg transition-shadow">
                        <CardHeader>
                            <CardTitle className="flex items-center gap-2">
                                <span className="text-2xl">📄</span>
                                Page Management
                            </CardTitle>
                            <CardDescription>
                                Manage static pages and content
                            </CardDescription>
                        </CardHeader>
                        <CardContent>
                            <div className="space-y-2">
                                <Button className="w-full" variant="outline" disabled>
                                    View All Pages
                                </Button>
                                <Button className="w-full" disabled>
                                    Create New Page
                                </Button>
                            </div>
                            <p className="text-xs text-gray-500 mt-2">Coming Soon</p>
                        </CardContent>
                    </Card>

                    <Card className="hover:shadow-lg transition-shadow">
                        <CardHeader>
                            <CardTitle className="flex items-center gap-2">
                                <span className="text-2xl">🖼️</span>
                                Gallery Management
                            </CardTitle>
                            <CardDescription>
                                Manage university photo gallery
                            </CardDescription>
                        </CardHeader>
                        <CardContent>
                            <div className="space-y-2">
                                <Button className="w-full" variant="outline" disabled>
                                    View Gallery
                                </Button>
                                <Button className="w-full" disabled>
                                    Add Photos
                                </Button>
                            </div>
                            <p className="text-xs text-gray-500 mt-2">Coming Soon</p>
                        </CardContent>
                    </Card>
                </div>

                {/* Recent Activity */}
                <Card>
                    <CardHeader>
                        <CardTitle>📊 Recent Activity</CardTitle>
                        <CardDescription>
                            Latest administrative actions and updates
                        </CardDescription>
                    </CardHeader>
                    <CardContent>
                        <div className="space-y-4">
                            <div className="flex items-center space-x-4">
                                <div className="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <div className="flex-1">
                                    <p className="text-sm">New student registered: John Doe (CS001234)</p>
                                    <p className="text-xs text-gray-500">2 hours ago</p>
                                </div>
                            </div>
                            <div className="flex items-center space-x-4">
                                <div className="w-2 h-2 bg-green-500 rounded-full"></div>
                                <div className="flex-1">
                                    <p className="text-sm">News article published: "New Research Facilities"</p>
                                    <p className="text-xs text-gray-500">5 hours ago</p>
                                </div>
                            </div>
                            <div className="flex items-center space-x-4">
                                <div className="w-2 h-2 bg-yellow-500 rounded-full"></div>
                                <div className="flex-1">
                                    <p className="text-sm">Faculty updated: Engineering Faculty</p>
                                    <p className="text-xs text-gray-500">1 day ago</p>
                                </div>
                            </div>
                        </div>
                    </CardContent>
                </Card>
            </div>
        </AppShell>
    );
}