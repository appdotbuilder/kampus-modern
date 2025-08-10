import React from 'react';
import { Head, Link } from '@inertiajs/react';
import { AppShell } from '@/components/app-shell';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Badge } from '@/components/ui/badge';

interface Faculty {
    id: number;
    name: string;
    code: string;
    description?: string;
    dean?: string;
    phone?: string;
    email?: string;
    is_active: boolean;
    study_programs_count?: number;
}

interface Props {
    faculties: {
        data: Faculty[];
        current_page: number;
        last_page: number;
        per_page: number;
        total: number;
    };
    [key: string]: unknown;
}

export default function FacultiesIndex({ faculties }: Props) {
    return (
        <AppShell>
            <Head title="Faculties Management" />
            
            <div className="space-y-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold text-gray-900">🏛️ Faculties Management</h1>
                        <p className="text-gray-600 mt-2">
                            Manage university faculties and departments
                        </p>
                    </div>
                    
                    <Link href="/admin/faculties/create">
                        <Button>
                            ➕ Add New Faculty
                        </Button>
                    </Link>
                </div>

                {faculties.data.length === 0 ? (
                    <Card>
                        <CardContent className="text-center py-12">
                            <div className="text-6xl mb-4">🏛️</div>
                            <h3 className="text-lg font-semibold mb-2">No Faculties Found</h3>
                            <p className="text-gray-600 mb-4">
                                Get started by creating your first faculty
                            </p>
                            <Link href="/admin/faculties/create">
                                <Button>Create Faculty</Button>
                            </Link>
                        </CardContent>
                    </Card>
                ) : (
                    <>
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            {faculties.data.map((faculty) => (
                                <Card key={faculty.id} className="hover:shadow-lg transition-shadow">
                                    <CardHeader>
                                        <div className="flex items-center justify-between">
                                            <CardTitle className="text-lg">
                                                {faculty.name}
                                            </CardTitle>
                                            <Badge variant={faculty.is_active ? "default" : "secondary"}>
                                                {faculty.is_active ? "Active" : "Inactive"}
                                            </Badge>
                                        </div>
                                        <CardDescription>
                                            Code: {faculty.code}
                                            {faculty.study_programs_count !== undefined && (
                                                <span className="ml-2">
                                                    • {faculty.study_programs_count} Programs
                                                </span>
                                            )}
                                        </CardDescription>
                                    </CardHeader>
                                    
                                    <CardContent className="space-y-4">
                                        {faculty.dean && (
                                            <div>
                                                <p className="text-sm font-medium text-gray-700">Dean</p>
                                                <p className="text-sm text-gray-600">{faculty.dean}</p>
                                            </div>
                                        )}
                                        
                                        {faculty.description && (
                                            <div>
                                                <p className="text-sm font-medium text-gray-700">Description</p>
                                                <p className="text-sm text-gray-600 line-clamp-3">
                                                    {faculty.description}
                                                </p>
                                            </div>
                                        )}
                                        
                                        <div className="flex items-center space-x-2 pt-2">
                                            <Link href={`/admin/faculties/${faculty.id}`}>
                                                <Button size="sm" variant="outline">
                                                    👁️ View
                                                </Button>
                                            </Link>
                                            <Link href={`/admin/faculties/${faculty.id}/edit`}>
                                                <Button size="sm">
                                                    ✏️ Edit
                                                </Button>
                                            </Link>
                                        </div>
                                    </CardContent>
                                </Card>
                            ))}
                        </div>

                        {/* Pagination */}
                        {faculties.last_page > 1 && (
                            <Card>
                                <CardContent className="flex items-center justify-between py-4">
                                    <div className="text-sm text-gray-600">
                                        Showing {((faculties.current_page - 1) * faculties.per_page) + 1} to{' '}
                                        {Math.min(faculties.current_page * faculties.per_page, faculties.total)} of{' '}
                                        {faculties.total} results
                                    </div>
                                    
                                    <div className="flex items-center space-x-2">
                                        {faculties.current_page > 1 && (
                                            <Button variant="outline" size="sm">
                                                Previous
                                            </Button>
                                        )}
                                        
                                        <span className="text-sm text-gray-600">
                                            Page {faculties.current_page} of {faculties.last_page}
                                        </span>
                                        
                                        {faculties.current_page < faculties.last_page && (
                                            <Button variant="outline" size="sm">
                                                Next
                                            </Button>
                                        )}
                                    </div>
                                </CardContent>
                            </Card>
                        )}
                    </>
                )}
            </div>
        </AppShell>
    );
}