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
        for (int i=0; i<=n; i++){
            mat[0][i] = 0;
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
                    mat[i][j] = mat[i][j] + mat[i-1][j] + mat[i][j-1];
                    ans = max(ans,mat[i][j]);
                }
            }
        }
        printf("%d",ans);
    }
}
