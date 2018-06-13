#include <stdio.h>
#include <ctype.h>
using namespace std;
int main()
{
    int T;
    scanf("%i", &T);
    for(int ikanteri = 1; ikanteri <= T; ikanteri++) {
        int n;
        scanf("%i", &n);
        char s_database[n][3];
        char s_depan[n][20];
        char s_belakang[n][20];
        for(int i = 0; i < n; i++) {
            scanf("%19s %19s", &s_depan[i], &s_belakang[i]);
            s_database[i][0] = s_depan[i][0];
            s_database[i][1] = s_depan[i][1];
            s_database[i][2] = s_depan[i][2];
            int x = 0;
            bool exist = false;
            for(int j = 0; j < n; j++) {
                if(j != i && s_database[i] == s_database[j]) {
                    exist = true;
                    break;
                }
            }
            if(exist == true) {
                s_database[i][2] = s_belakang[i][0];
                for(int j = 0; j < n; j++) {
                    if(j != i && s_database[i] == s_database[j]) {
                        printf("GAGAL\n");
                        return 0;
                    }
                }
            }
        }
        for(int i = 0; i < n; i++) {
            printf("%s ", s_database[i]);
        }
    }
    return 0;
}
