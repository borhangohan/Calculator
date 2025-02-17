def generate_marksheet(num_students, num_assignments, assignment_marks):
    final_marks = []
    for i in range(num_students):
        student_marks = sorted(assignment_marks[i*num_assignments:(i+1)*num_assignments-1])
        avg_marks = sum(student_marks)/(num_assignments-1)
        final_marks.append(avg_marks)
    return final_marks
def generate_comment(final_score):
    if final_score > 5:
        print("Good Work")
    else:
        print("Not good")
# Example input data
num_students = 5
num_assignments = 4
assignment_marks = [0, 2, 3, 8.0, 4, 7.0, 4, 2, 3, 8.5, 7.0, 2, 4, 1, 0, 1, 4, 3, 2, 2]

# Call generate_marksheet() function to get the final marks for each student
final_marks = generate_marksheet(num_students, num_assignments, assignment_marks)

# Call generate_comment() function to print comments for each student
for i in range(num_students):
    generate_comment(final_marks[i])
