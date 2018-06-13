#include <iostream>
#include <cstdio>
using namespace std;

int main(){
    int t;
    scanf("%d",&t);
    while (t--){
        int n,m;
        scanf("%d %d",&n,&m);
        int mat[n+1][m+1];
        for (int i=0; i<=m; i++){
            mat[0][i] = 0;
        }
        for (int i=0; i<=n; i++){
            mat[i][0] = 0;
        }
        for (int i=1; i<=n; i++){
            for (int j=1; j<=m; j++){
                scanf("%d",&mat[i][j]);
            }
        }
        int ans=0;
        for (int i=1; i<=n; i++){
            for (int j=1; j<=m; j++){
                if (mat[i][j] == 0) continue;
                else{
                    if (mat[i-1][j] == 0){
                        mat[i][j] = mat[i-1][j-1] + mat[i][j];
                    }
                    mat[i][j] = mat[i][j] + mat[i][j-1];
                }
            }
        }
        int te;
        for (int j=1; j<=m; j++){
                te = 0;
            for (int i=1; i<=n; i++){
                te = te + mat[i][j];
            }
            ans = max(ans,te);
        }
        printf("%d",ans);
    }
}
